<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Intro;

class IntroCommentController extends Controller
{
        public function store(Request $request, $intro_id)
    {
       
       $comment = Comment::create ([
            'comment' => $request->comment,
            'user_id' => \Auth::id(),
            ]);
    
        $intro = Intro::findOrFail($intro_id);
        $intro->comments()->attach($comment->id);
 
        return redirect()->route('postintro.view', $intro_id);
    }
    
    
    public function show($id) {
        
        $intro = Intro::find($id);
        $comment = new Comment;
        
        // dd($skill->user());

        return view('postintro.view', ['intro' => $intro, 'comment' => $comment]);
        
    }
   
}
