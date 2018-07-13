<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Skill;

use App\Intro;

class PostsController extends Controller
{
    public function index()
    {
        $user = [];
        if (\Auth::check()) {
            $user = User::all();
               
            foreach ($user as $tmp) {
                $intro = Intro::where('user_id', $tmp->id)->get();
                $tmp->intro = $intro;
                
                // $skill = Skill::where('user_id', $tmp->id);
                // $tmp->skill = $skill;
            }
           
        }
        return view('welcome',["users" => $user]);
        
    }
    
        public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->posts()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    
        public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect()->back();
    }
}
