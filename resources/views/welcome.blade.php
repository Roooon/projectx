@extends('layouts.app')

@section('content')

        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
@if (count($users) > 0)
        <div class="col-xs-8 row" id="main">
        @if (count($users) > 0)
            <ul class="media-list">

            @foreach ($merged as $m)
            <?php
            $user = App\User::find($m->user_id);
            ?>
            <li class="media">
            <div class="media-body post-layout">
                @if($m->type == "intro")
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $user->touser_id]) !!}の紹介文を書いたよ！ {{ $m->created_at }}</span>
                </div>
                @else
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $user->touser_id]) !!}のスキルについて書いたんご！ {{ $m->created_at }}</span>
                </div>
                @endif
                <div>
                    <p>{!! nl2br(e($m->content)) !!}</p>
                </div>

                <div>
                    @if (Auth::id() == $user->user_id)
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
           

        </div>
    </li>
    <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$intro->post_picture)}}"alt="写真を挿入">
    
    @endforeach
   
 

        <aside id="sidebar">
            @if (count($users) > 0)
            <h3>おすすめユーザー</h3>
            <ul class="media-list">
                <?php
                    $me = Auth::user();
                ?>
                @foreach ($users as $user)
                @if($user->id != $me->id)
                <li class='userlist'>
                    <div class="media-left">
                        <a href='{{ action('UserController@show', ['id' => $user->id]) }}'>
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 35) }}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <div>
                            {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}
                        </div>
                        <div>
                            @if (Auth::id() != $user->id)
                                @if (Auth::user()->is_following($user->id))
                                    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-block btn-xs"]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                    {!! Form::submit('Follow', ['class' => "btn btn-primary btn-block btn-xs"]) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
            @endif
        </aside>
</div>

@else
<div class="center jumbotron">
    <div class="title">
        <h1>小さいスキルを世界へ</h1>
        <h2>ProjectXへようこそ</h2>
        </div>
        {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
</div>
    @endif
@endsection