<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['user_id', 'friend_id'];

    public function friendUser()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
