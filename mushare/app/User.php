<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likedPosts()
    {
        return $this->morphedByMany('App\Post', 'likeable')->whereDeletedAt(null);
    }

    public function dislikedPosts()
    {
        return $this->morphedByMany('App\Post', 'dislikeable')->whereDeletedAt(null);
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }

    public function isAdmin()
    {
        return $this->admin;
    }
}
