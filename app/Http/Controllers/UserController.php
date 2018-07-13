<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index() {

        $user = \Auth::user();
        
        return view('profile.profile', [
            'user' => $user,
        ]);
    }
    
    public function show($id) {
        $user = \Auth::user();
        return view('profile.show', [
            'user' => $user,
        ]);

}
    public function user_follows($id)
    {
        $user = User::find($id);
        $follows = $user->user_follows()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $follows,
        ];

        $data += $this->counts($user);

        return view('profile.user_follows', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('profile.followers', $data);
}   
    
}