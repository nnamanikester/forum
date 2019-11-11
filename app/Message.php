<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [

        'from',
        'to',
        'body'

    ];


    public function user() {

        return $this->belongsTo('App\User');

    }



}
