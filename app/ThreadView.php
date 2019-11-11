<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadView extends Model
{

    protected $fillable = [

        'thread_id',
        'ip_address',
        'date',
        'count'

    ];



}
