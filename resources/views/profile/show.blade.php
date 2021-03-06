
@extends('layouts.app')

@section('content')

@if (Auth::user()->id != $user->id)
        <div class="mainframe">
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
        <!--      <div class="logo">-->
        <!--<div class="col-xs-4">-->
        <!--    <div class="panel panel-default">-->
        <!--        <div class="panel-heading">-->
        <!--            <h2 class="panel-title">{{ $user->email }}</h2>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">-->
        <!--        </div>-->
        <!--    </div>-->

        <!--      <div class="logo">-->
        <!--<div class="col-xs-4">-->
        <!--    <div class="panel panel-default">-->
        <!--        <div class="panel-heading">-->
        <!--            <h2 class="panel-title">{{ $user->email }}</h2>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            @if(!empty($user->imagepath))-->
        <!--    <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$user->imagepath)}}"alt="写真を挿入">-->
        <!--@else-->
        <!--            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">-->
        <!--@endif-->
        <!--        </div>-->
        <!--    </div>-->
        <!--        @if (Auth::id() == $user->id)-->
        <!--        {!! Form::open(['route' =>'userimage.store','method' =>'post','files' => 'true','enctype'=>'multipart/form-data'],['class' => 'introform']) !!}-->
        <!--        {!! Form::submit('投稿') !!}-->
        
        
        <!--        <div class="form-group">-->
        <!--            {!!Form::label('file','プロフィール写真アップロード',['class'=>'control-label']) !!}-->
        <!--            {!!Form::file('file')!!}-->
        <!--        </div>-->
        <!--    {!! Form::close() !!}-->
        <!--        @endif-->

<div class="follow_botan">
            @include('buttons.follow_button', ['user' => $user])
            </div>
            <div class="jikoshoukai">
            <h3>自己紹介</h3>
            <div>
            @include('profile.selfintro')
            </div>
            </div>
            
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
    
    @else
    <div class="mainframe">
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
        <!--      <div class="logo">-->
        <!--<div class="col-xs-4">-->
        <!--    <div class="panel panel-default">-->
        <!--        <div class="panel-heading">-->
        <!--            <h2 class="panel-title">{{ $user->email }}</h2>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">-->
        <!--        </div>-->
        <!--    </div>-->

        <!--      <div class="logo">-->
        <!--<div class="col-xs-4">-->
        <!--    <div class="panel panel-default">-->
        <!--        <div class="panel-heading">-->
        <!--            <h2 class="panel-title">{{ $user->email }}</h2>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            @if(!empty($user->imagepath))-->
        <!--    <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$user->imagepath)}}"alt="写真を挿入">-->
        <!--@else-->
        <!--            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">-->
        <!--@endif-->
        <!--        </div>-->
        <!--    </div>-->
        <!--        @if (Auth::id() == $user->id)-->
        <!--        {!! Form::open(['route' =>'userimage.store','method' =>'post','files' => 'true','enctype'=>'multipart/form-data'],['class' => 'introform']) !!}-->
        <!--        {!! Form::submit('投稿') !!}-->
        
        
        <!--        <div class="form-group">-->
        <!--            {!!Form::label('file','プロフィール写真アップロード',['class'=>'control-label']) !!}-->
        <!--            {!!Form::file('file')!!}-->
        <!--        </div>-->
        <!--    {!! Form::close() !!}-->
        <!--        @endif-->


            @include('buttons.follow_button', ['user' => $user])
            
            <div class="jikoshoukai">
            <h3>自己紹介</h3>
            <div>
            @include('profile.selfintro')
            </div>
            </div>
            
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
    @endif
    
    
  
@endsection
