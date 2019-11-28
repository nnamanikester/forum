<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{

    protected $fillable = [

        'user_id',
        'following_id'

    ];


    public function user() {

        return $this->belongsTo('App\User');

    }

    public function followers() {

        return $this->hasMany('App\Follower', 'follower_id', 'user_id');

    }


    public function follower() {

        return $this->belongsTo('App\Follower', 'user_id', 'follower_id');

    }


}
