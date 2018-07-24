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
        'post_user'=> $post_user,
    ]
        );
    }
    
    public function store(Request $request)
    {
        $skills = new Skill;
        $skills->user_id = \Auth::user()->id;
        $skills->touser_id = $request->touser_id;
        $skills->content = $request->content;
        $skills->skillname = $request->skillname;
        $skills->save();

        return redirect('/');
    }
    
    public function show() {
        
        $id = $_GET["id"]; 
        
        $user = User::find($id);
        $skills = Skill::where('touser_id', $id)->orderBy('created_at', 'desc')->paginate(20);
        $data = [
            'user' => $user,
            'skills' => $skills,
        ];

        $data += $this->counts($user);

        return view('skills.myskills', $data);
    }

     public function destroy($id)
    {
      
        $skills = \App\Skill::find($id);

        if (\Auth::user()->id === $skills->user_id) {
            $skills->delete();
        }

        return redirect()->back();
}
}