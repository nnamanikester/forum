<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadSubscription extends Model
{

    protected $fillable = [

        'user_id',
        'thread_id'

    ];

    public function users() {

        return $this->hasManyThrough('App\User', 'App\Thread');

    }


}
