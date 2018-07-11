<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {

        $users = User::paginate(10);
        
        return view('profile.show', [
            'users' => $users,
        ]);
    }
    
    public function show($id) {
        $user = User::find($id);
        
        return view('profile.show');
    }
}