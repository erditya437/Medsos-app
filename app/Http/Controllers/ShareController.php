<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Share;
use App\Models\Chat; // tambahin ini
use App\Models\Post;
use App\Models\Notification;

class ShareController extends Controller
{
   public function store(Request $request)
{
   $request->validate([
    'post_id' => 'required|exists:posts,id',
    'to_user_ids' => 'required|array|min:1',
    'to_user_ids.*' => 'exists:users,id',
    'caption' => 'nullable|string',
]);


   foreach ($request->to_user_ids as $toUserId) {
    Share::create([
        'user_id' => auth()->id(),
        'to_user_id' => $toUserId,
        'post_id' => $request->post_id,
        'caption' => $request->caption,
    ]);

    // ✅ Tambahkan kirim otomatis ke chat
    $post = Post::find($request->post_id);
  $chatText = '📣 Membagikan postingan: <a href="'.route('home', ['scroll_to' => $post->id]).'#post-'.$post->id.'" style="color:blue;">'
            . ($post->caption ? e($post->caption) : '[tanpa caption]') . '</a>';
    Chat::create([
        'from_user_id' => auth()->id(),
        'to_user_id' => $toUserId,
        'message' => $chatText,
        'type' => 'share', // misalnya kamu punya tipe chat (text/photo/share)
    ]);

    // ✅ Tambah Notifikasi Baru
    Notification::create([
        'user_id' => $toUserId,
        'from_user_id' => auth()->id(),
        'type' => 'share_post',
        'message' => 'membagikan postingan kepada kamu.',
        'post_id' => $request->post_id, // untuk link di notif
    ]);
}

    return redirect()->back()->with('success', 'Berhasil membagikan postingan.');
}

}
