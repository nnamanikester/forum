<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = [

        'path',
        'created_by',
        'updated_by'

    ];


    public function user() {

        return $this->belongsTo('App\User');

    }


}
