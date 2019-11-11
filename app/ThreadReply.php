<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReply extends Model
{

    protected $fillable = [

        'user_id',
        'thread_id',
        'body',
        'created_by',
        'updated_by'

    ];


    public function thread() {

        return $this->belongsTo('App\Thread');

    }

    public function user() {

        return $this->belongsTo('App\User');

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

        return $this->hasMany('App\ThreadReplyReply');

    }






}
