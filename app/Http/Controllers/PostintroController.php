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
    }//
}
