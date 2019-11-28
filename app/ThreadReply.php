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

        return $this->hasMany('App\ThreadReplyDislike');

    }

    public function likes() {

        return $this->hasMany('App\ThreadReplyLike');

    }

    public function favourites() {

        return $this->hasMany('App\ThreadReplyFavourite');

    }

    public function flags() {

        return $this->hasMany('App\ThreadReplyFlag');

    }

    public function replies() {

        return $this->hasMany('App\ThreadReplyReply');

    }






}
