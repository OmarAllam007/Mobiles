<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    protected $fillable = ['user_id','mobile_id'];

    function user(){
        return $this->belongsTo(User::class,'id');
    }
}
