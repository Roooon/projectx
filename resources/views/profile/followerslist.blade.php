@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="bottons">
            <div class="col-sm-8">
            <a class="a_botan_intro" href="{{ route('postintro.create', ['id' => $user->id]) }}">Write intro</a>
            <a class="a_botan_skill" href="{{ route('skills.create', ['id' => $user->id]) }}">Add skill</a>
            </div>
            <!--<div class="col-sm-8">-->
            <!--<div class="btnaf">-->
            <!--<a class="a_botan_follows" href="{{ route('users.follows', ['id' => $user->id]) }}">Follows</a>-->
            <!--<a class="a_botan_followers" href="{{ route('users.followers', ['id' => $user->id]) }}">Followers</a>-->
            <!--</div>-->
            <!--</div>-->
        </div>
        
        <div class="gravetar_name">
<img class="media-object img-rounded img-responsive user_pic" src="{{ Gravatar::src($user->email, 50) }}" alt="uuu">
<div class="user_name hover_color">{!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}</div>
</div>

<ul class="follow_follwers">
    <li>
        <a href="{{ route('users.follows', ['id' => $user->id]) }}" class="hover_color">Follow<br>
        {{ $count_follows }}</a>
    </li>
    <li>
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="hover_color">Followers<br>
        {{ $count_followers }}</a>
    </li>
<ul>
        <!--<aside class="col-xs-4">-->
        <!--    <div class="panel panel-default">-->
        <!--        <div class="panel-heading">-->
        <!--            <h3 class="panel-title">{{ $user->email }}</h3>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    @include('buttons.follow_button', ['user' => $user])-->
        <!--</aside>-->
        
        <div class="followerslist">
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                </ul>
            @include('users.userprofile', ['users' => $users])
        </div>
        </div>
    </div>
@endsection