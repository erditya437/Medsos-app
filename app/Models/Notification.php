<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   protected $fillable = ['user_id', 'from_user_id', 'type', 'message', 'post_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function from() {
        return $this->belongsTo(User::class, 'from_user_id');
    }

        // Notification.php
    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class, 'post_id');
    }

}
