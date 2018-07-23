
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="bottons">
            <div class="col-sm-8">
            <a class="btn btn-info btn-lg" href="{{ route('postintro.create', ['id' => $user->id]) }}">Write intro</a>
            <a class="btn btn-info btn-lg" href="{{ route('skills.create', ['id' => $user->id]) }}">Add skill</a>
            </div>
            <div class="col-sm-8">
            <div class="btnaf">
            <a class="btn btn-info btn-lg" href="{{ route('users.follows', ['id' => $user->id]) }}">follows</a>
            <a class="btn btn-info btn-lg" href="{{ route('users.followers', ['id' => $user->id]) }}">followers</a>
            </div>
            </div>
        </div>
              <div class="logo">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ $user->email }}</h2>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">
                </div>
            </div>
            @include('buttons.follow_button', ['user' => $user])
            
            
            <h3>Self introduction</h3>
        </div>
        </div>
        <div class="skill_intro">
            <div class="col-xs-8">
           <ul class="nav nav-tabs nav-justified">
                <li role="presentation"><a href="{{ route('skills.show', ['id' => $user->id]) }}">My Skills <span class="badge"></span></a></li>
                <li role="presentation"><a href="{{ route('postintro.show', ['id' => $user->id]) }}">My Intros <span class="badge"></span></a></li>

            </ul>
             
            </div>
        </div>
    </div>
@endsection
