<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        
        return view('profil e.show');
    }
}