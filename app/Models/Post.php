<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function follow()
    {
        return $this->belongsToMany(Post::class, Addfriend::class, 'friend_id', 'friend_id');
    }
    public function like()
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
    public function hasLike($user_id, $post_id)
    {
        return  Like::where('post_id', $post_id)->where('user_id', $user_id)->exists();
    }

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function comment()
    {
        return $this->hasMany(comments::class, 'post', 'post_id', 'id');
    }
}
