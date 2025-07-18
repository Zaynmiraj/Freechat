<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addfriend extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
