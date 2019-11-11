<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReplyReply extends Model
{

    protected $fillable = [

        'user_id',
        'thread_reply_id',
        'body',
        'created_by',
        'updated_by'
    ];



    public function thread_reply() {

        return $this->belongsTo('App\ThreadReply');

    }


    public function users() {

        return $this->belongsTo('App\User');

    }





}
