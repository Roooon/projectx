@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="bottons">
        {!! link_to_route('postintro.create','Write intro' ,['id' => $user->id]) !!}
        {!! link_to_route('skills.create','Add skill' ,['id' => $user->id]) !!}
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
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/*/follows') ? 'active' : '' }}"><a href="{{ route('users.follows', ['id' => $user->id]) }}">Follows <span class="badge">{{ $count_follows }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation"><a href="{{ route('skills.show', ['id' => $user->id]) }}">My Skills <span class="badge"></span></a></li>
                <li role="presentation"><a href="{{ route('postintro.show', ['id' => $user->id]) }}">My Intros <span class="badge"></span></a></li>
            </ul>
            @include('users.userprofile', ['users' => $users])
        </div>
    </div>
@endsection