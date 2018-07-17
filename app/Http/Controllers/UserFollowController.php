<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        \Auth::user()->follow($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return redirect()->back();
    }
    
    public function count_follows($user) {
        $count_follows = $user->user_follows()->count();
        
        return 
        ['count_follows' => $count_follows,
        ];
    }
    
    public function count_followers($user) {
        $count_followers = $user->followers()->count();
        
        return 
        ['count_followers' => $count_followers,];
    }
}
