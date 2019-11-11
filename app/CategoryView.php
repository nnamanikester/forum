<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryView extends Model
{

    protected $fillable = [

        'category_id',
        'ip_address',
        'date',
        'count'

    ];



}
