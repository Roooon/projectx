<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Intro;    // add

use App\User;

class PostintroController extends Controller
{
    
    
    public function create()
    {
         $id = $_GET["id"];
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
    
    public function show() {
        
        $id = $_GET["id"]; 
        
        $user = User::find($id);
        $intros = Intro::where('touser_id', $id)->orderBy('created_at', 'desc')->paginate(20);

        $data = [
            'user' => $user,
            'intros' => $intros,
        ];

        $data += $this->counts($user);

        return view('postintro.myintros', $data);
    }
    public function destroy($id)
    {
        $intros = \App\Intro::find($id);

        if (\Auth::user()->id === $intros->user_id) {
            $intros->delete();
        }

        return redirect()->back();
}
}
