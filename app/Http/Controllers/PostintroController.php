<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Intro;    // add

class PostintroController extends Controller
{
    public function index()
    {
        //  $yaalists = Yaalist::all();

        // return view('yaalists.index'
        // ,['yaalists' => $yaalists,]
        // );
    }
    
     public function create()
    {
         $intro = Intro::all();

        return view('postintro.create'
        ,['intro' => $intro,]
        );
    }
    
     public function store(Request $request)
    {
        // $intro = new Intro;
        // $intro->content = $request->content;
        // $intro->save();

        // return redirect('/');
    }
    
    public function show($id)
    {
    //   $intro = Intro::find($id);

    //     return view('postintro.show', [
    //         'intro' => $intro,
    //     ]); 
    }
    
    public function edit($id)
    {
        // $intro = Intro::find($id);

        // return view('postintro.edit', [
        //     'intro' => $intro,
        // ]);
    }
    
    public function update(Request $request, $id)
    {
        // $intro = Intro::find($id);
        // $intro->content = $request->content;
        // $intro->save();

        // return redirect('/');
    }
    
    public function destroy($id)
    {
        // $intro = Intro::find($id);
        // $intro->delete();

        // return redirect('/');
    }

}
