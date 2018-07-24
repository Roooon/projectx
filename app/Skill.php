<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['content', 'user_id', 'touser_id'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }    
    
    // public function comments() {
        
    //     return $this->belongsTo(Skill::class);
    // }

    public function comments() {
        
        return $this->belongsToMany(Comment::class, 'skills_comment', 'skill_id', 'comment_id')->orderBy('created_at','desc');
    }

}
