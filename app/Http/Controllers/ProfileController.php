<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function create()
    {
        $profile = Profile::all();

        return view('profile.editselfintro'
        ,['profile' => $profile,
    ]
        );
    }
    public function edit($id)
    {
        $profile = Profile::find($id);

        return view('profile.editselfintro'
        ,['profile' => $profile, 'id' => $id
    ]
        );
    }

    public function show($id)
    {
        
        $user = User::find($id);
        $profile = $user->profile();

        return view('profile.show', ['profile' => $profile,
    ]);
    }


    public function store(Request $request)
    {
        $user = \Auth::user();
        $user->profile()->create([
        'birthdate' => $request->birthdate,
        'hobby' => $request->hobby,
        'appeal' => $request->appeal
        ]);

        return redirect()->route('profile.show',['id'=>\Auth::user()->id]);
    }
    
    public function update(Request $request, $id)
    {
        $profile = \Auth::user()->profile()->where('user_id',$id);
        
        if($profile->exists()){
            $profile->update([
            'birthdate' => $request->birthdate,
            'hobby' => $request->hobby,
            'appeal' => $request->appeal,
            ]);
        } else{
            $profile->create([
            'birthdate' => $request->birthdate,
            'hobby' => $request->hobby,
            'appeal' => $request->appeal,
            ]);
        }
        return redirect()->route('profile.show',['id'=>\Auth::user()->id]);
    }
}
