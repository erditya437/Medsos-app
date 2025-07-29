<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Notification;

class FollowController extends Controller
{
    public function toggle(Request $request)
{
    $request->validate(['user_id' => 'required|exists:users,id']);
    $targetId = $request->user_id;
    $user = auth()->user();

    if ($targetId == $user->id) {
        return response()->json(['message' => 'Tidak bisa follow diri sendiri.'], 422);
    }

    $follow = Follow::where('user_id', $user->id)
        ->where('followed_user_id', $targetId)
        ->first();

    if ($follow) {
        $follow->delete();

        // Hapus dari friends juga
        \App\Models\Friend::where([
        ['user_id', $user->id],
        ['friend_id', $targetId]
        ])->orWhere([
        ['user_id', $targetId],
        ['friend_id', $user->id]
        ])->delete();
        
    } else {
        Follow::create([
            'user_id' => $user->id,
            'followed_user_id' => $targetId,
            'status' => 'pending',
        ]);

        Notification::create([
            'user_id' => $targetId,
            'from_user_id' => $user->id,
            'type' => 'follow_request',
            'message' => 'mengirim permintaan mengikuti kamu.',
        ]);
        
    }


    // Jumlah followers accepted
    $followers_count = Follow::where('followed_user_id', $targetId)->where('status', 'accepted')->count();
    $isFollowing = Follow::where('user_id', $user->id)->where('followed_user_id', $targetId)->exists();

    return response()->json([
        'following' => $isFollowing,
        'followers_count' => $followers_count
    ]);
}

public function count($userId)
{
    $followers = Follow::where('followed_user_id', $userId)->where('status', 'accepted')->count();
    $following = Follow::where('user_id', $userId)->where('status', 'accepted')->count();
    return response()->json(['followers' => $followers, 'following' => $following]);
}

public function followersList($userId)
{
    $followers = Follow::where('followed_user_id', $userId)
        ->where('status', 'accepted')
        ->with('user')
        ->get()
        ->map(fn($f) => [
            'name' => $f->user->name,
            'id' => $f->user->id, 
            'profile_photo' => $f->user->profile_photo ? asset('storage/'.$f->user->profile_photo) : 'https://via.placeholder.com/40',
        ]);

    return response()->json($followers);
}

public function followingList($userId)
{
    $following = Follow::where('user_id', $userId)
        ->where('status', 'accepted')
        ->with('followedUser')
        ->get()
        ->map(fn($f) => [
            'id' => $f->followedUser->id,
            'name' => $f->followedUser->name,
            'profile_photo' => $f->followedUser->profile_photo ? asset('storage/'.$f->followedUser->profile_photo) : 'https://via.placeholder.com/40',
        ]);

    return response()->json($following);
}


public function accept($fromUserId)
{
    $user = auth()->user();

    // Update follow jadi accepted
    Follow::where('user_id', $fromUserId)
        ->where('followed_user_id', $user->id)
        ->update(['status' => 'accepted']);

    // Cek apakah saling follow accepted
    $mutual = Follow::where('user_id', $user->id)
                ->where('followed_user_id', $fromUserId)
                ->where('status', 'accepted')
                ->exists();

    if ($mutual) {
        // Tambahkan ke tabel friends
        \App\Models\Friend::firstOrCreate([
            'user_id' => $user->id,
            'friend_id' => $fromUserId
        ]);
        \App\Models\Friend::firstOrCreate([
            'user_id' => $fromUserId,
            'friend_id' => $user->id
        ]);
    }

    // Hapus notifikasi
    Notification::where('user_id', $user->id)
        ->where('from_user_id', $fromUserId)
        ->where('type', 'follow_request')
        ->delete();

    return back()->with('success', 'Permintaan diterima.');
}

public function reject($fromUserId)
{
    $user = auth()->user();

    Follow::where('user_id', $fromUserId)
        ->where('followed_user_id', $user->id)
        ->delete();

    Notification::where('user_id', $user->id)
        ->where('from_user_id', $fromUserId)
        ->where('type', 'follow_request')
        ->delete();

    return back()->with('success', 'Permintaan ditolak.');
}
}
