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
}
