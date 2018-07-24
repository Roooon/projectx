<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Skill;

class SkillCommentController extends Controller
{
    //

    
    public function store(Request $request, $skill_id)
    {
       
       $comment = Comment::create ([
            'comment' => $request->comment,
            'user_id' => \Auth::id(),
            ]);
    
        $skill = Skill::findOrFail($skill_id);
        $skill->comments()->attach($comment->id);
 
        return redirect()->route('skills.view', $skill_id);
    }
    
    
    public function show($id) {
        
        $skill = Skill::find($id);
        $comment = new Comment;
        
        // dd($skill->user());

        return view('skills.view', ['skill' => $skill, 'comment' => $comment]);
        
    }
   
}
