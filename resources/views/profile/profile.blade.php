
@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ $user->email }}</h2>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">
                </div>
            </div>
            @include('buttons.follow_button', ['users' => $users])
        </aside>
        <div class="col-xs-8">
           <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/*/follows') ? 'active' : '' }}"><a href="{{ route('users.follows', ['id' => $user->id]) }}">Follow <span class="badge"></span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge"></span></a></li>
            </ul>
             
        </div>
    </div>
@endsection
{!! $users->render() !!}