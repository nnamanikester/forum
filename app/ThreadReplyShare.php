<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReplyShare extends Model
{

    protected $fillable = [

        'thread_reply_id',
        'ip_address',
        'count'

    ];




}
