<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFullName()
    {
        return $this->name;
    }


    public function friends()
    {
        return $this->belongsToMany(User::class, 'addfriends', 'user_id', 'friend_id');
    }
    public function message()
    {
        return $this->belongsToMany(User::class, 'messages', 'user_id', 'receive');
    }

    public function friend($friend_id)
    {
        return Addfriend::where('friend_id', $friend_id)->where('user_id', Auth::user()->id)->exists();
    }


    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comment()
    {
        return $this->hasOne(comments::class);
    }

    // public function liked(Like $like)
    // {
    //     if (Auth::user()->likes($like)) {
    //         return true;
    //     }
    // }
}
