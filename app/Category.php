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

    public function views() {

        return $this->hasMany('App\CategoryView');

    }


    public function subscriptions() {

        return $this->hasMany('App\CategorySubscription');

    }


    public function favourites() {

        return $this->hasMany('App\CategoryFavourite');

    }


    public function threads() {

        return $this->hasMany('App\Thread');

    }



}
