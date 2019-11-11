<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFavourite extends Model
{


    protected $fillable = [

        'category_id',
        'user_id'

    ];

    //Might be necessary

    public function category() {

        return $this->belongsTo('App\Category');

    }

    public function user() {

        return $this->belongsTo('App\Category');

    }


}
