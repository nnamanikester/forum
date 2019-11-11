<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadFlag extends Model
{

    protected $fillable = [

        'user_id',
        'thread_id'

    ];


    public function thread() {

        return $this->belongsTo('App\Thread');

    }

    public function users() {

        return $this->hasManyThrough('App\User', 'App\Thread');

    }







}
