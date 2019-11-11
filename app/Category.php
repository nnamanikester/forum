<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [

        'name',
        'description',
        'created_by',
        'updated_by'

    ];



}
