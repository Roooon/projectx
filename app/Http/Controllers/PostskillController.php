<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skill;    // add
use App\User;

class PostskillController extends Controller
{
     public function create()
    {
        $id = $_GET["id"];
         $post_user=User::find($id);    
         $skills = Skill::all();

        return view('skills.create'
        ,['skills' => $skills,
        'post_user'=> $post_user]
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