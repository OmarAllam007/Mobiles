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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function isAdmin()
    {
        return $this->is_admin;
    }

    function likes()
    {
        return $this->belongsToMany(Mobile::class, 'user_likes', 'user_id', 'mobile_id');
    }

    function isFavourite($mobile_id){
        return $this->likes()->where('mobiles.id',$mobile_id)->count();
    }
}
