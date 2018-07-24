@extends('layouts.app')

@section('content')

<ul class="media-list">
    
    <?php $user = $intro->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
            {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が {!! link_to_route('profile.show', App\User::find($intro->touser_id)->email, ['id' => $intro->touser_id]) !!}の紹介文を書いたよ！ {{ $intro->created_at }}
            </div>
            <div>
                <p>{!! nl2br(e($intro->content)) !!}</p>
            </div>
        </div>
    </li>
</ul>

{!! Form::model($comment, ['route' => ['introcomments.store', $intro->id]]) !!}
        
        {!! Form::label('comment','コメント :') !!}
        {!! Form::text('comment') !!}

        {!! Form::submit('投稿') !!}
{!! Form::close() !!}

@foreach($intro->comments as $comment)
<ul>
    <li><p>{!! link_to_route('profile.show', $comment->user->email, ['id' => $comment->user_id]) !!} : {{ $comment->comment }} at {{ $comment->created_at }}</p></li>
</ul>
@endforeach
</div>
@endsection
