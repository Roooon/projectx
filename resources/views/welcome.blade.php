@extends('layouts.app')

@section('content')
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
@if (count($users) > 0)
    <ul class="media-list">
    @foreach ($users as $user)
    
    @foreach ($user->merged as $m)
    <li class="media">
            <div class="media-left">
            </div>
        <div class="media-body">
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
    
    @endforeach
<!--
    @foreach ($user->intro as $intro)
    <li class="media">
            <div class="media-left">
            </div>
        <div class="media-body">
            <div>
               
                {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', App\User::find($intro->touser_id)->email, ['id' => $user->touser_id]) !!}の紹介文を書いたよ！ {{ $intro->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($intro->content)) !!}</p>
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
    
    @endforeach
   
    @foreach ($user->skills as $skills)
    <li class="media">
            <div class="media-left">
            </div>
        <div class="media-body">
            <div>
                {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', $user->email, ['id' => $user->touser_id]) !!}のスキルについて書いたんご！ {{ $skills->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($skills->content)) !!}</p>
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
    
    @endforeach
   -->
@endforeach
</ul>
    </div>
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