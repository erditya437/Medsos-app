<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Ambil semua followers yang status accepted
        $followers = Follow::where('followed_user_id', $userId)
            ->where('status', 'accepted')
            ->with('follower')
            ->get();

        return view('friends.index', compact('followers'));
    }

    public function destroy($followerId)
    {
        $userId = auth()->id();

        // Unfollow mereka (hapus follow mereka ke kita)
        Follow::where('user_id', $followerId)
            ->where('followed_user_id', $userId)
            ->delete();

        return back()->with('success', 'Pengikut dihapus.');
    }

    public function search(Request $request)
{
    $query = $request->q;
    $friends = \App\Models\User::where('name', 'like', '%'.$query.'%')->get();

    return view('friends.search', compact('friends', 'query'));
}

}
