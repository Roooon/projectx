<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillCommentController extends Controller
{
    //
    
    public function store(Request $request)
    {
        //
        $skill = Skill::findOrFail($request->skill_id);
        
        Comment::create ([
            'comment' => $request->comment;
            'user_id' => Auth::id();
            'skill_id' => $skill->skill_id
            ]);
            
        return redirect()->route('skills.view', $skill->id);
    }
    
   
}
