@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $user->email }}
            </div>
                <p>{!! link_to_route('profile.show', 'View profile', ['id' => $user->id]) !!}</p>
            <div>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif