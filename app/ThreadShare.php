<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadShare extends Model
{

    protected $fillable = [

        'thread_id',
        'ip_address',
        'count',

    ];




}
