<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteView extends Model
{

    protected $fillable = [

        'ip_address',
        'url',
        'count',
        'date'

    ];



}
