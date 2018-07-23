@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="bottons">
            <div class="col-sm-8">
            <a class="a_botan_intro" href="{{ route('postintro.create', ['id' => $user->id]) }}">Write intro</a>
            <a class="a_botan_skill" href="{{ route('skills.create', ['id' => $user->id]) }}">Add skill</a>
            </div>
            <div class="col-sm-8">
            <div class="btnaf">
            <a class="a_botan_follows" href="{{ route('users.follows', ['id' => $user->id]) }}">Follows</a>
            <a class="a_botan_followers" href="{{ route('users.followers', ['id' => $user->id]) }}">Followers</a>
            </div>
            </div>
        </div>
        
        
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->email }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">
                </div>
            </div>
            @include('buttons.follow_button', ['user' => $user])
        </aside>
        <div class="followslist">
        <div class="col-xs-8">
            
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/*/follows') ? 'active' : '' }}"><a href="{{ route('users.follows', ['id' => $user->id]) }}">Follows <span class="badge">{{ $count_follows }}</span></a></li>
                </ul>
                
            @include('users.userprofile', ['users' => $users])
        </div>
        </div>
    </div>
@endsection