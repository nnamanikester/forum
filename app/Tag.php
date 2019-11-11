<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [

        'name',
        'created_by',
        'updated_by'

    ];


    public function threads() {

        return $this->belongsToMany('App\Thread');

    }




}
