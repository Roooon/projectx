<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //list of users
    public function index() {

        $users = User::paginate(10);
        
        return view('users.show', [
            'users' => $users,
        ]);
    }
    
    public function show($id) {
        
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(20);

        $data = [
            'user' => $user,
            'posts' => $posts,
        ];

        $data += $this->counts_posts($user);

        return view('profile.profile', $data);
    }
    
    public function user_follows($id)
    {
        $user = User::find($id);
        $follows = $user->user_follows()->paginate(20);

        $data = [
            'user' => $user,
            'users' => $user_follows,
        ];

        $data += $this->counts_follows($user);

        return view('profile.user_follows', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(20);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts_followers($user);

        return view('profile.followers', $data);
}
}