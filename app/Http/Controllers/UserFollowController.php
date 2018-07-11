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
    
    public function counts_follows($user) {
        $count_user_follows = $user->user_follows()->count();
        
        return 
        ['count_user_follows' => $count_user_follows,
        ];
    }
    
    public function counts_followers($user) {
        $count_followers = $user->followers()->count();
        
        return 
        ['count_followers' => $count_followers,];
    }
}
