<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Intro;    // add

class PostintroController extends Controller
{
    
    
    public function create()
    {
         $intro = Intro::all();

        return view('postintro.create'
        ,['intro' => $intro,]
        );
    }
    
    public function store(Request $request)
    {
    //    var_dump($request->file('file'));
     //   var_dump($_FILES);
       // \Storage::put('test.dat', "test");
     $filename = $request->file('file')->store('public/images');
//        var_dump($filename);
//       return;
        $intro = new Intro;
        $intro->post_picture=basename($filename);
        $intro->user_id = \Auth::user()->id;
        $intro->touser_id = $request->touser_id;
        $intro->content = $request->content;
        $intro->save();

        return redirect('/');
    }
}
