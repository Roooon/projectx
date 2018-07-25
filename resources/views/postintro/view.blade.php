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
        
        <textarea class="write_comment" cols="50" name="comment" placeholder="comment" rows="5"></textarea>    
        <!--{!! Form::label('comment','コメント :') !!}-->
        <!--{!! Form::text('comment') !!}-->

        {!! Form::submit('投稿') !!}
{!! Form::close() !!}

@foreach($intro->comments as $comment)

    <p><div class="comment_detail">
        
        <img class="media-object img-rounded img-responsive post__icon" src="{{ Gravatar::src($user->email, 30) }}" alt="">
        <div class="comment_username">
        {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}</div>  : {{ $comment->comment }} </div>
    <p>{{ $comment->created_at }}</p></p></li>

@endforeach
</div>
@endsection
