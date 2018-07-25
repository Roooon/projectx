 @if (count($users) > 0)
            <p class='fontstyle2'>知り合いかも？</p>
            <ul class="media-list">
                <?php
                    $me = Auth::user();
                  //  var_dump($me);
//                    return;
                ?>
                @foreach ($users as $user)
                
                @if($user->id != $me->id && $user->id != Auth::user()->is_following($user->id))
                <li class='userlist'>
                    <div class="media-left">
                        <a href='{{ action('UserController@show', ['id' => $user->id]) }}'>
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 30) }}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="fontstyle4">
                            {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}
                        </p>
                        <div class='timeline_follow_botton'>
                            @if (Auth::id() != $user->id)
                                @if (Auth::user()->is_following($user->id))
                                    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-xs"]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                    {!! Form::submit('Follow', ['class' => "btn btn-primary btn-xs"]) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
            @endif