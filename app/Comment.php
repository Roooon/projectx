<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
     protected $fillable = ['comment', 'user_id'];
 
  public function intro_comment()
  {
    return $this->belongsTo(Intro::class)->orderBy('created_at');
  }
  
   public function skill_comment()
  {
    return $this->belongsTo(Skill::class)->orderBy('created_at');
  }
 
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
