<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Intro;    // add

class PostintroController extends Controller
{
    
    
    public function create($id)
    {
        
         $post_user=User::find($id);
         $intro = Intro::all();

        return view('postintro.create'
        ,['intro' => $intro,
          'post_user'=> $post_user]
        );
    }
    
    public function store(Request $request)
    {
        $intro = new Intro;
        $intro->user_id = \Auth::id();
        $intro->touser_id = $request->touser_id;
        $intro->content = $request->content;
        $intro->save();

        return redirect('/');
    }
}
