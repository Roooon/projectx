@extends('layouts.app')

@section('content')

<ul class="media-list">
    
    <?php $user = $skill->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が {!! link_to_route('profile.show', App\User::find($skill->touser_id)->email, ['id' => $skill->touser_id]) !!}のスキルについて書いたんご！ {{ $skill->created_at }}
            </div>
            <div>
                <h4>{!! nl2br(e($skill->skillname)) !!}</h4>
                <p>{!! nl2br(e($skill->content)) !!}</p>
            </div>
        </div>
    </li>
</ul>

{!! Form::model($comment, ['route' => ['skillcomments.store', $skill->id]]) !!}

    <textarea class="write_comment" cols="50" name="comment" placeholder="comment" rows="5"></textarea>    
        <!--{!! Form::label('comment','コメント :') !!}-->
        <!--{!! Form::text('comment') !!}-->

        {!! Form::submit('投稿') !!}
{!! Form::close() !!}

@foreach($skill->comments as $comment)
<ul>
    <li><p>{!! link_to_route('profile.show', $comment->user->email, ['id' => $comment->user_id]) !!} : {{ $comment->comment }} at {{ $comment->created_at }}</p></li>
</ul>
@endforeach
</div>

@endsection
