<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReplyDislike extends Model
{

    protected $fillable = [

        'user_id',
        'thread_reply_id'

    ];



    public function thread_reply() {

        return $this->belongsTo('App\ThreadReply');

    }


    public function users() {

        return $this->hasManyThrough('App\User', 'App\ThreadReply');

    }



}
