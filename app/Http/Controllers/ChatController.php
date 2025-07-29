<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function index($friendId)
    {
        $user = auth()->user();
        $friend = User::findOrFail($friendId);

        $chats = Chat::where(function($q) use ($user, $friendId) {
            $q->where('from_user_id', $user->id)->where('to_user_id', $friendId);
        })->orWhere(function($q) use ($user, $friendId) {
            $q->where('from_user_id', $friendId)->where('to_user_id', $user->id);
        })->orderBy('created_at')->get();

        return view('chat.index', compact('friend', 'chats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'message' => 'nullable|string',
            'media' => 'nullable|file|max:5000'
        ]);

        $mediaPath = null;
        $mediaType = 'none'; // <-- perbaikan di sini

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('chat_media', 'public');
            $mime = $request->file('media')->getMimeType();
            $mediaType = str_contains($mime, 'video') ? 'video' : 'image';
        }

        Chat::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
            'message' => $request->message,
            'media' => $mediaPath,
            'media_type' => $mediaType
        ]);

        \App\Models\Notification::create([
        'user_id' => $request->to_user_id, // penerima
        'from_user_id' => auth()->id(), // pengirim
        'type' => 'chat',
        'message' => 'mengirim pesan.',
    ]);


        return back();
    }

    public function history()
{
    $user = auth()->user();

    // Ambil daftar teman
    $friends = \App\Models\User::whereHas('followers', function($q) use ($user) {
        $q->where('user_id', $user->id)->where('status', 'accepted');
    })->whereHas('following', function($q) use ($user) {
        $q->where('followed_user_id', $user->id)->where('status', 'accepted');
    })->get();

    return view('chat.history', compact('friends'));
}

}
