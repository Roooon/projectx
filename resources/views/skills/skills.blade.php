<ul class="media-list">
@foreach ($skills as $skill)
    <?php $user = $skill->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $skill->created_at }}</span>
            </div>
            <div>
                <h4>{!! nl2br(e($skill->skillname)) !!}</h4>
                <p>{!! nl2br(e($skill->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $skill->user_id)
                    {!! Form::open(['route' => ['skills.destroy', $skill->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        <p>{!! link_to_route('skills.view', 'Comments', ['id' => $skill->id]) !!}</p>
        </div>
    </li>
@endforeach
</ul>
{!! $skills->render() !!}
