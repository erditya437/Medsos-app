<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

   protected $fillable = ['post_id', 'user_id', 'comment', 'parent_id', 'media', 'media_type'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies', 'user');
    }

    public function parent()
{
    return $this->belongsTo(Comment::class, 'parent_id')->with('user');
}

public function likes() {
    return $this->hasMany(Like::class);
}

}