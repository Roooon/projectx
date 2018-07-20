 @if (count($users) > 0)
            <h3>おすすめユーザー</h3>
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
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 35) }}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <div>
                            {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!}
                        </div>
                        <div>
                            @if (Auth::id() != $user->id)
                                @if (Auth::user()->is_following($user->id))
                                    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-block btn-xs"]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                    {!! Form::submit('Follow', ['class' => "btn btn-primary btn-block btn-xs"]) !!}
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