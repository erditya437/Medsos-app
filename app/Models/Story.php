<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['user_id', 'media', 'media_type', 'caption', 'background_color'];

    public function user() { return $this->belongsTo(User::class); }
    public function likes() { return $this->hasMany(StoryLike::class); }
    public function comments() { return $this->hasMany(StoryComment::class); }
}
