<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\StoryLike;
use App\Models\StoryComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    // ✅ TAMPILKAN LIST SEMUA STORY
   public function index()
{
    $user = Auth::user();

    $friendIds = \App\Models\Follow::where('user_id', $user->id)
        ->where('status', 'accepted')
        ->pluck('followed_user_id')
        ->push($user->id); // supaya story sendiri tetap muncul

    $stories = Story::with('user', 'likes', 'comments')
        ->whereIn('user_id', $friendIds)
        ->latest()
        ->get()
        ->groupBy('user_id');

    return view('story.story', compact('stories'));
}


    // ✅ SIMPAN STORY BARU
    public function store(Request $request)
    {
        $request->validate([
            'media' => 'nullable|file|mimes:jpg,png,mp4|max:10000',
            'caption' => 'nullable|string|max:255',
            'background_color' => 'nullable|string',
            'media_type' => 'required|string|in:text,photo,video',
        ]);

        $story = new Story();
        $story->user_id = Auth::id();
        $story->caption = $request->caption;
        $story->media_type = $request->media_type;

        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('stories', 'public');
            $story->media = $path;
        }

        if ($request->media_type == 'text') {
            $story->background_color = $request->background_color;
        }

        $story->save();

        return back()->with('success', 'Story berhasil ditambahkan.');
    }

    // ✅ LIKE/UNLIKE STORY
    public function toggleLike(Request $request)
    {
        $request->validate(['story_id' => 'required|exists:stories,id']);

        $storyId = $request->story_id;
        $like = StoryLike::where('story_id', $storyId)->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
        } else {
            StoryLike::create([
                'story_id' => $storyId,
                'user_id' => Auth::id()
            ]);

            $story = Story::find($storyId);
    if ($story->user_id != Auth::id()) {
        \App\Models\Notification::create([
            'user_id' => $story->user_id,
            'from_user_id' => Auth::id(),
            'type' => 'like_story',
            'story_id' => $storyId,
            'message' => 'menyukai story kamu.'
        ]);
    }

}

          


        $likeCount = StoryLike::where('story_id', $storyId)->count();

        return response()->json([
            'liked' => !$like,
            'like_count' => $likeCount
        ]);
    }

    // ✅ STATUS LIKE UNTUK STORY
    public function likeStatus($id)
    {
        $liked = StoryLike::where('story_id', $id)->where('user_id', Auth::id())->exists();
        $count = StoryLike::where('story_id', $id)->count();

        return response()->json([
            'liked' => $liked,
            'likes' => $count
        ]);
    }

    // ✅ KOMEN DI STORY
public function comment(Request $request)
{
    $request->validate([
        'story_id' => 'required|exists:stories,id',
        'comment' => 'required|string|max:255'
    ]);

    StoryComment::create([
        'story_id' => $request->story_id,
        'user_id' => Auth::id(),
        'comment' => $request->comment
    ]);

    $story = Story::find($request->story_id);
    if ($story->user_id != Auth::id()) {
        \App\Models\Notification::create([
            'user_id' => $story->user_id,
            'from_user_id' => Auth::id(),
            'type' => 'comment_story',
            'story_id' => $story->id,
            'message' => $request->comment
        ]);
    }

    return response()->json(['success' => true]);
}

    public function destroy(Story $story)
{
    if ($story->user_id != Auth::id()) {
        return response()->json(['error' => 'Tidak diizinkan'], 403);
    }

    if ($story->media) {
        Storage::disk('public')->delete($story->media);
    }

    $story->delete();

    return response()->json(['success' => true]);
}

}
