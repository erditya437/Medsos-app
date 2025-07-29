<?php

// CommentApiController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentApiController extends Controller
{
    public function getComments(Post $post)
    {
        $post->load('user');

        $comments = Comment::with(['user', 'replies.user', 'replies.replies.user','replies.parent.user','parent.user'])
            ->where('post_id', $post->id)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'post' => [
                'id' => $post->id,
                'caption' => $post->caption,
                'tag' => $post->tag,
                'media' => $post->media,
                'media_type' => $post->media_type,
                'user' => [
                    'name' => $post->user->name,
                    'profile_photo' => $post->user->profile_photo ? asset('storage/'.$post->user->profile_photo) : 'https://via.placeholder.com/40'
                ]
            ],
            'comments' => $comments->map(function ($comment) {
                return $this->mapComment($comment);
            })
        ]);
    }

   private function mapComment($comment) {
    return [
        'id' => $comment->id,
        'comment' => $comment->comment,
        'media' => $comment->media,
        'media_type' => $comment->media_type,
        'created_at' => $comment->created_at->diffForHumans(),
        'user' => [
            'name' => $comment->user->name,
            'profile_photo' => $comment->user->profile_photo ? asset('storage/'.$comment->user->profile_photo) : 'https://via.placeholder.com/40'
        ],
        'parent' => $comment->parent ? [
            'id' => $comment->parent->id,
            'user' => [
                'name' => $comment->parent->user->name ?? 'Anonim'
            ]
        ] : null,
        'replies' => $comment->replies->map(fn($r) => $this->mapComment($r))->values(),
    ];
}



   public function store(Request $request)
{
   $request->validate([
    'post_id' => 'required|exists:posts,id',
    'comment' => 'nullable|string',
    'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
    'reply_to' => 'nullable|exists:comments,id',
]);

if (!$request->comment && !$request->hasFile('media')) {
    return response()->json(['message' => 'Komentar atau media harus diisi'], 422);
}


    $user = Auth::user();
    $post = Post::findOrFail($request->post_id);

    $mediaPath = null;
    $mediaType = null;

    if ($request->hasFile('media')) {
        $file = $request->file('media');
        $mediaPath = $file->store('comments', 'public');
        $mediaType = str_contains($file->getMimeType(), 'video') ? 'video' : 'photo';
    }


   $comment = Comment::create([
    'post_id' => $post->id,
    'user_id' => $user->id,
    'comment' => $request->comment ?? '',
    'parent_id' => $request->reply_to,
    'media' => $mediaPath,
    'media_type' => $mediaType
]);



    // Kalau reply balas ke user komentar, kalau komen biasa ke pemilik postingan
    if ($request->reply_to) {
        $parentComment = Comment::find($request->reply_to);
        if ($parentComment && $parentComment->user_id != $user->id) {
            \App\Models\Notification::create([
                'user_id' => $parentComment->user_id,
                'from_user_id' => $user->id,
                'type' => 'reply_comment',
                'message' => $request->comment,
               'post_id' => $post->id
            ]);
        }
    } else {
        if ($post->user_id != $user->id) {
            \App\Models\Notification::create([
                'user_id' => $post->user_id,
                'from_user_id' => $user->id,
                'type' => 'comment_post',
                'message' => $request->comment,
                'post_id' => $post->id
            ]);
        }
    }

    return response()->json(['message' => 'Komentar terkirim']);
}

}
