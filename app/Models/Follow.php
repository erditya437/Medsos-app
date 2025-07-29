<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {
    protected $fillable = ['user_id', 'followed_user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function followedUser() {
        return $this->belongsTo(User::class, 'followed_user_id');
    }

    // tambahan alias
    public function follower() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
