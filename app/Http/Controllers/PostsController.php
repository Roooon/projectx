<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Skill;

use App\Intro;



class PostsController extends Controller
{
    
    public static function cmp($a, $b) {
        if ($a->created_at == $b->created_at) {
            return 0;
        }
        return ($a->created_at > $b->created_at) ? -1 : 1;
    }

    public function index()
    {

        $user = [];
               $merged = array();

        if (\Auth::check()) {
            $user = User::all();
               
            foreach ($user as $tmp) {
               $intro = Intro::where('user_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                $tmp->intro = $intro;
                foreach($tmp->intro as $t) {
                  array_push($merged, $t);
                    $t->type= "intro";
                }
              $skills = Skill::where('user_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                $tmp->skills = $skills;
                foreach($tmp->skills as $tt) {
                  array_push($merged, $tt);
                  $tt->type = "skill";
                }
                
                //var_dump($merged);
               // $tmp->merged = $merged;
                //$tmp->skills = array();

            }

        }
                usort($merged, array('App\Http\Controllers\PostsController','cmp'));

        return view('welcome',["users" => $user,'merged'=>$merged]);
        
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
