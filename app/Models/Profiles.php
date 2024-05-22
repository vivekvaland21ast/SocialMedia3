<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Profiles extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'profiles';
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'profile',
        'archive'
    ];

    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    // public function friends()
    // {
    //     return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    // }
    public function hasFriend($friendId)
    {
        return $this->friends()->where('friend_id', $friendId)->exists();
    }
    public function friends()
    {
        return $this->belongsToMany(Profiles::class, 'friends', 'user_id', 'friend_id');
    }

}
