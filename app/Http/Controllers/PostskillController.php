<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Skill;    // add

class PostskillController extends Controller
{
     public function create()
    {
         $skills = Skill::all();

        return view('skills.create'
        ,['skills' => $skills,]
        );
    }
    
    public function store(Request $request)
    {
        $skills = new Skill;
        $skills->user_id = \Auth::user()->id;
        $skills->touser_id = $request->touser_id;
        $skills->content = $request->content;
        $skills->save();

        return redirect('/');
    }
}