<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $fillable = ['content', 'user_id', 'touser_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function touser()
    {
        return $this->belongsTo(User::class);
    }
    
      public function comments() {
        
        return $this->belongsToMany(Comment::class, 'intros_comment', 'intro_id', 'comment_id')->orderBy('created_at', 'desc');
    }
}
