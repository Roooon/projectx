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
        if (\Auth::check()){
            
        $user = [];
        $merged = array();
        $user = User::all();
        $me = \Auth::user();

        $count_follows = $this->counts($me)['count_follows'];
        $count_followers = $this->counts($me)['count_followers'];

        if (\Auth::check()) {
            $me = \Auth::user();

            $follow_users = $me->user_follows()->get();
            //$follow_user_ids = array();
            //foreach ($follow_users as $value) {
             //   array_push($follow_user_ids, $value->id);
            //}
            //DB::select("select * from ")
            //return;
            foreach ($follow_users as $tmp) {
//               if(in_array($tmp->id, (array)$follow_user_ids))
               {
               $intro = Intro::where('user_id', $tmp->id)->orderBy('created_at', 'desc')->get();
               // $tmp->intro = $intro;
                foreach($intro as $t) {
                  array_push($merged, $t);
                    $t->type= "intro";
                }
               }
                {
                   $intro = Intro::where('touser_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                    foreach($intro as $t) {
                      array_push($merged, $t);
                        $t->type= "intro";
                    }
                }
                {
                    $skills = Skill::where('user_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                 //   $tmp->skills = $skills;
                    foreach($skills as $tt) {
                      array_push($merged, $tt);
                      $tt->type = "skill";
                    }
                }
                {
                    $skills = Skill::where('touser_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                    foreach($skills as $tt) {
                      array_push($merged, $tt);
                      $tt->type = "skill";
                    }
                }
                
                //var_dump($merged);
               // $tmp->merged = $merged;
                //$tmp->skills = array();

            }

        }
                usort($merged, array('App\Http\Controllers\PostsController','cmp'));

        return view('welcome',[
            "users" => $user,
            'merged'=>array_unique($merged),
            'me'=> $me,
            'count_follows'=>$count_follows,
            'count_followers'=>$count_followers
            ]);
        }
        else 
        return view('welcome');
    }
    
    
        public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:500',
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
