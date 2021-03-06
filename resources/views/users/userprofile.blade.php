@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-left">
            <a href='{{ action('UserController@show', ['id' => $user->id]) }}'>
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            </a>
        </div>
        <div class="media-body">
                <p>{!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}</p>
            <div>
            </div>
        </div>
    </li>
@endforeach
</ul>

@endif

<!--same as micropost user.user blade-->