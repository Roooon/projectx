 @if (count($follows) > 0)
<p class="fontstyle">フォローしてるユーザーの<br>
紹介文&スキルを書こう！！</p>
            
<ul class="media-list">
    @foreach ($follows as $follow)
        <li class='userlist2'>
            <div class="media-left">
                <a href='{{ action('UserController@show', ['id' => $follow->id]) }}'>
                <img class="media-object img-rounded user_pic" src="{{ Gravatar::src($follow->email, 30) }}" alt="">
                </a>
            </div>
            <div class="media-body">
                <p class="fontstyle3 user_name">{!! link_to_route('profile.show', $follow->email, ['id' => $follow->id]) !!}</p>
            <div>   
        </li>
    @endforeach
</ul>

@endif