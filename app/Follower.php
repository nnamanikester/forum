<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{

    protected $fillable = [

        'user_id',
        'follower_id'

    ];


    public function user() {

        return $this->belongsTo('App\User');

    }


    public function following() {

        return $this->hasOne('App\Following', 'user_id', 'follower_id');

    }


}
