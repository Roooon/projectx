@extends('layouts.app')

@section('content')

<ul class="media-list">
@foreach ($posts as $post)
    <?php $user = $post->user; ?>
    <li class="media">
        <div class="media-left">
            
        </div>
        <a href=
        <div class="media-body">
            <div>
                {!! link_to_route('profile.profile', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $post->user_id)
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            @include('buttons.favorite_button', ['post' => $post])
        </div>
    </li>
@endforeach
</ul>
{!! $posts->render() !!}

@endsection