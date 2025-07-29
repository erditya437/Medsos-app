<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
   public function index()
{
    $notifications = \App\Models\Notification::where('user_id', auth()->id())
    ->with(['from', 'post'])
    ->latest()
    ->get();


    return view('notifikasi.index', compact('notifications'));
}

}
