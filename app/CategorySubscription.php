<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubscription extends Model
{


    protected $fillable = [

        'category_id',
        'user_id'

    ];


    public function category() {

        return $this->belongsTo('App\Category');

    }

    public function user() {

        return $this->belongsTo('App\Use');

    }


}
