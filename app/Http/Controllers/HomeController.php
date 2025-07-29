<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        $followers = Follow::where('followed_user_id', auth()->id())
            ->where('status', 'accepted')
            ->with('follower')
            ->get();

        // ✅ Ambil story hanya dari teman (accepted) + diri sendiri
        $friendIds = Follow::where('user_id', auth()->id())
            ->where('status', 'accepted')
            ->pluck('followed_user_id')
            ->push(auth()->id()); // tambahkan diri sendiri

        $stories = Story::with('user')
            ->whereIn('user_id', $friendIds)
            ->latest()
            ->get()
            ->groupBy('user_id');

        return view('home.index', compact('posts', 'followers', 'stories'));
    }
}
