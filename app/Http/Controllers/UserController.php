<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index() {

        $user = \Auth::user();
        
        return view('profile.show', [
            'user' => $user,
            'users' => $users
        ]);
    }
    
    public function show($id) {
        $user = User::find($id);
        $users = User::paginate();
        $count_follows = $this->counts($user)['count_follows'];
        $count_followers = $this->counts($user)['count_followers'];
        $profile = $user->profile()->get();
        
        return view('profile.show', [
            'user' => $user,
            'users' => $users,
            'count_follows'=>$count_follows,
            'count_followers'=>$count_followers,
            'profile'=>$profile,
            
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

        return view('profile.followslist', $data);
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

        return view('profile.followerslist', $data);
}   
    public function FindUser()
{
    // Find an Breed by name
     $list = User::where('email','LIKE', '%' . $_GET["keyword"] . '%')->get();

    //return response()->json($list);
  // var_dump($_GET["keyword"]);
//var_dump($list);
    return view('search.search',array('list'=>$list));
}
}