<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'level_id',
        'username',
        'country',
        'website',
        'bio',
        'status',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships

    public function threads() {

        return $this->hasMany('App\Thread');

    }

    public function level() {

        return $this->belongsTo('App\Level');

    }

    public function role() {

        return $this->belongsTo('App\Role');

    }

    public function photo() {

        return $this->belongsTo('App\Photo');

    }

    public function followers() {

        return $this->hasMany('App\Follower');

    }

    public function favourite_categories() {

        return $this->hasMany('App\CategoryFavourite');

    }

    public function category_subscriptions() {

        return $this->hasMany('App\CategorySubscription');

    }

    public function liked_threads() {

        return $this->hasMany('App\ThreadLike');

    }

    public function disliked_threads() {

        return $this->hasMany('App\ThreadDislike');

    }

    public function favourite_threads() {

        return $this->hasMany('App\ThreadFavourite');

    }

    public function flagged_threads() {

        return $this->hasMany('App\ThreadFlag');

    }

    public function thread_replies() {

        return $this->hasMany('App\ThreadReply');

    }

    public function disliked_thread_replies() {

        return $this->hasMany('App\ThreadReplyDislike');

    }

    public function liked_thread_replies() {

        return $this->hasMany('App\ThreadReplyLike');

    }

    public function favourite_thread_replies() {

        return $this->hasMany('App\ThreadReplyFavourite');

    }

    public function thread_shares() {

        return $this->hasMany('App\ThreadShare');

    }

    public function thread_reply_shares() {

        return $this->hasMany('App\ThreadReplyShare');

    }

    public function thread_reply_replies() {

        return $this->hasMany('App\ThreadReplyReply');

    }

    public function thread_subscriptions() {

        return $this->hasMany('App\ThreadSubscription');

    }




    //Function Checks

    public function isAdmin() {

        if($this->role->name == 'administrator') {

            return true;

        }

        return false;

    }

    public function isModerator() {

        if($this->role->name == 'moderator') {

            return true;

        }

        return false;

    }






}
