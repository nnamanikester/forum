<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Thread extends Model
{

    protected $fillable = [

        'user_id',
        'category_id',
        'topic',
        'description',
        'slug',
        'status',
        'created_by',
        'updated_by'

    ];


    public function getCreatedByAttribute($value) {

        $user = User::findOrFail($value);

        return Str::title($user->username);

    }

    public function getUpdatedByAttribute($value) {

        $user = User::findOrFail($value);

        return Str::title($user->username);

    }


    public function user() {

        return $this->belongsTo('App\User');

    }


    public function tags() {

        return $this->belongsToMany('App\Tag');

    }


    public function category() {

        return $this->belongsTo('App\Category');

    }


    public function dislikes() {

        return $this->hasMany('App\ThreadDislike');

    }


    public function likes() {

        return $this->hasMany('App\ThreadLike');

    }


    public function favourites() {

        return $this->hasMany('App\ThreadFavourite');

    }


    public function flags() {

        return $this->hasMany('App\ThreadFlag');

    }


    public function replies() {

        return $this->hasMany('App\ThreadReply');

    }


    public function views() {

        return $this->hasMany('App\ThreadView');

    }


    public function subscriptions() {

        return $this->hasMany('App\ThreadSubscription');

    }


    public function shares() {

        return $this->hasMany('App\ThreadShare');

    }






}
