 @foreach ($merged as $m)
            <?php
            $user = App\User::find($m->user_id);
            ?>
            <li class="media">
            <div class="media-body post-layout">
                @if($m->type == "intro")
                <div class='post_title'>
                     <img class="media-object img-rounded img-responsive post__icon" src="{{ Gravatar::src($user->email, 30) }}" alt="">{!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が  <img class="media-object img-rounded img-responsive post__icon" src="{{ Gravatar::src($m->email, 30) }}" alt="">{!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}の紹介文を書いたよ！
                </div>
                @else
                <div class='post_title'>
                    <img class="media-object img-rounded img-responsive post__icon" src="{{ Gravatar::src($user->email, 30) }}" alt="">{!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が <img class="media-object img-rounded img-responsive post__icon" src="{{ Gravatar::src($m->email, 30) }}" alt="">{!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}のスキルについて書いたんご！ 
                </div>
               @endif
                <div>
                    <p class='post_content'>{!! nl2br(e($m->content)) !!}</p>
                    <div class='post_time'>
                        {{ $m->created_at }}
                    </div>
                    <div class="photo">
                        
                        @if (!empty($m->post_picture))

                         <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$m->post_picture)}}"alt="写真を挿入">
 
                        @endif
                    </div>
                </div>
            </div>
            </li>
@endforeach