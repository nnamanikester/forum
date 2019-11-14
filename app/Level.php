<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = [

        'name',
        'created_by',
        'updated_by'

    ];


    public function users() {

        return $this->hasMany('App\User');

    }



}
