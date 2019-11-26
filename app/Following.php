<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{

    protected $fillable = [

        'user_id',
        'following_id'

    ];


    public function user() {

        return $this->belongsTo('App\User');

    }


}
