@extends('layouts.app')

@section('content')

<div>

        <div class="col-xs-8 row" id="main">
        @if (\Auth::check()) 
            <ul class="media-list">

@include('profile.timeline')           
        
            </ul>
        </div>

        <aside id="sidebar">
@include('users.recommended_user')        
        </aside>
</div>

@else
<div class="center jumbotron">
    <div class="text-center">
        <h1>小さいスキルを世界へ</h1>
        <h2>ProjectXへようこそ</h2>
        {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
</div>
@endif
@endsection