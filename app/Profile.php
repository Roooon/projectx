<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['birthdate', 'user_id', 'hobby', 'appeal'];

    public function user()
    {

        return $this->belongsTo(User::class);
    } 
}
