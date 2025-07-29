<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

  protected $fillable = ['user_id', 'caption', 'media', 'media_type', 'tag'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes() {
    return $this->hasMany(Like::class);
}

}

