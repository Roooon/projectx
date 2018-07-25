<div class="gravetar_name">
    <a href='{{ action('UserController@show', ['id' => $me->id]) }}'>
        <img class="media-object img-rounded img-responsive user_pic" src="{{ Gravatar::src($me->email, 50) }}" alt="uuu">
    </a>
    <div class="user_name hover_color">{!! link_to_route('profile.show', $me->email, ['id' => $me->id]) !!}</div>
</div>

<ul class="follow_follwers">
    <li>
        <a href="{{ route('users.follows', ['id' => $me->id]) }}" class="hover_color">Follow<br>
        {{ $count_follows }}</a>
    </li>
    <li>
        <a href="{{ route('users.followers', ['id' => $me->id]) }}" class="hover_color">Followers<br>
        {{ $count_followers }}</a>
    </li>
<ul>


