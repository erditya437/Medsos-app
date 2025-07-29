<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeApiController extends Controller
{
   public function toggle(Request $request)
{
    $request->validate([
        'post_id' => 'nullable|exists:posts,id',
        'comment_id' => 'nullable|exists:comments,id',
    ]);

    if (!$request->post_id && !$request->comment_id) {
        return response()->json(['message' => 'Post atau Comment wajib diisi'], 422);
    }

    $user = Auth::user();

    $like = Like::where('user_id', $user->id)
        ->when($request->post_id, fn($q) => $q->where('post_id', $request->post_id))
        ->when($request->comment_id, fn($q) => $q->where('comment_id', $request->comment_id))
        ->first();

    if ($like) {
        $like->delete();
        return response()->json(['message' => 'Unlike berhasil']);
    } else {
        Like::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
        ]);

        // Bikin notifikasi ke target user
        if ($request->post_id) {
            $post = Post::find($request->post_id);
            if ($post && $post->user_id != $user->id) {
                \App\Models\Notification::create([
                    'user_id' => $post->user_id,
                    'from_user_id' => $user->id,
                    'type' => 'like_post',
                    'message' => '',
                    'post_id' => $post->id
                ]);
            }
        }

        if ($request->comment_id) {
            $comment = Comment::find($request->comment_id);
            if ($comment && $comment->user_id != $user->id) {
                \App\Models\Notification::create([
                    'user_id' => $comment->user_id,
                    'from_user_id' => $user->id,
                    'type' => 'like_comment',
                    'message' => '',
                    'post_id' => $comment->post_id
                ]);
            }
        }

        return response()->json(['message' => 'Like berhasil']);
    }
}


    public function status(Request $request)
    {
        $request->validate([
            'post_id' => 'nullable|exists:posts,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $liked = Like::where('user_id', Auth::id())
            ->when($request->post_id, fn($q) => $q->where('post_id', $request->post_id))
            ->when($request->comment_id, fn($q) => $q->where('comment_id', $request->comment_id))
            ->exists();

        $count = Like::when($request->post_id, fn($q) => $q->where('post_id', $request->post_id))
            ->when($request->comment_id, fn($q) => $q->where('comment_id', $request->comment_id))
            ->count();

        return response()->json([
            'liked' => $liked,
            'count' => $count
        ]);
    }
}
