<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
     public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //user_follows is the people who I am following//
     public function user_follows()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    //people who follow me//
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
{
    // confirm if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->user_follows()->attach($userId);
        return true;
    }
}

    public function unfollow($userId)
{
    // confirming if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // stop following if following
        $this->user_follows()->detach($userId);
        return true;
    } else {
        // do nothing if not following
        return false;
    }
}


    public function is_following($userId) {
    return $this->user_follows()->where('follow_id', $userId)->exists();
}
}
