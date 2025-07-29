<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'caption' => 'nullable|string',
        'tag' => 'required|string', // ✅ tambah validasi tag
        'media' => 'required|file|mimes:jpeg,png,jpg,mp4,mov|max:50480'
    ]);

    $file = $request->file('media');
    $path = $file->store('posts', 'public');

    $media_type = in_array($file->extension(), ['mp4', 'mov']) ? 'video' : 'photo';

    Post::create([
        'user_id' => Auth::id(),
        'caption' => $request->caption,
        'media' => $path,
        'media_type' => $media_type,
        'tag' => $request->tag,
    ]);

    return redirect('/home');
}

public function destroy($id)
{
    $post = \App\Models\Post::findOrFail($id);

    // Hapus media jika ada
    if ($post->media) {
        \Storage::delete('public/' . $post->media);
    }

    $post->delete();

    return redirect()->back()->with('success', 'Postingan berhasil dihapus.');
}


}
