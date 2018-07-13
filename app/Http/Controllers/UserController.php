<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index() {

        $users = \Auth::user();
        
        return view('profile.show', [
            'users' => $users,
        ]);
    }
    
    public function show($id) {
        $users = \Auth::user();
        
        return view('profile.show', [
            'users' => $users,
        ]);

}}