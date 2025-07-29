<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
   public function index()
{
    $user = Auth::user();
    $posts = \App\Models\Post::where('user_id', $user->id)->latest()->get();
    return view('profile.index', compact('user', 'posts'));
}


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:8048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:8096',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->bio = $request->bio;

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete('public/' . $user->profile_photo);
            }
            $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::delete('public/' . $user->cover_photo);
            }
            $user->cover_photo = $request->file('cover_photo')->store('cover_photos', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

  public function show($id)
{
    $user = \App\Models\User::findOrFail($id);

    $followers = \App\Models\Follow::where('followed_user_id', $user->id)->count();
    $following = \App\Models\Follow::where('user_id', $user->id)->count();
    $isFollowing = false;

    if (auth()->check()) {
        $isFollowing = \App\Models\Follow::where('user_id', auth()->id())
            ->where('followed_user_id', $user->id)
            ->exists();
    }

    $posts = \App\Models\Post::where('user_id', $user->id)->latest()->get();

    return view('profile.show', compact('user', 'followers', 'following', 'isFollowing', 'posts'));
}


}
