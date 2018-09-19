<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileComment extends Model
{
    protected $fillable = [
        'name', 'user_id', 'comment', 'is_approved', 'approved_by', 'up_rate', 'down_rate'
        , 'ip_address', 'country', 'city', 'mobile_id'
    ];

    protected $dates = ['created_at'];

    function morphToJson()
    {
        return [
            'username' => \Auth::check() ? \Auth::user()->name : $this->name,
            'created' => $this->created_at->diffForHumans(),
            'country'=>$this->country,
            'comment'=>$this->comment,
            'city'=>$this->city,
        ];
    }
}
