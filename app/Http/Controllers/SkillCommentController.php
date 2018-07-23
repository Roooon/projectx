<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Skill;

class SkillCommentController extends Controller
{
    //
    
    public function store(Request $request)
    {
        //
        $skill = Skill::findOrFail($request->skill_id);
        
        Comment::create ([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'skill_id' => $skill->skill_id
            ]);
            
        return redirect()->route('skills.view', $skill->id);
    }
    
    public function show($id) {
        
        $comment = Comment::find($id);
        $skills = Skill::where('user_id', $id);

        $data = [
            'comment' => $comment,
            'skills' => $skills,
        ];


        return view('skills.view', $data);
        
    }
   
}
