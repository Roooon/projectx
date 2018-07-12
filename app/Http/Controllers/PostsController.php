<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Skill;

use App\Intro;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $intro = Intro::all();
            $skills = Skill::all();
            $posts = [
                'intro' => $intro,
                'skill' => $skills,
                ];
            
            // dd($user->orderBy('created_at', 'desc')->get()->toArray());

            // $data = [
            //     'user' => $user,
            //     'posts' => $posts,
            // ];
        }
        return view('welcome', $posts);
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
