 @foreach ($merged as $m)
            <?php
            $user = App\User::find($m->user_id);
            ?>
            <li class="media">
            <div class="media-body post-layout">
                @if($m->type == "intro")
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}の紹介文を書いたよ！ {{ $m->created_at }}
                </div>
                @else
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}のスキルについて書いたんご！ {{ $m->created_at }}
                </div>
               @endif
                <div>
                    @if ($m->type == "intro")
                    <p>{!! nl2br(e($m->content)) !!}</p>
                    @else
                    <h4>{!! nl2br(e($m->skillname)) !!}</h4>
                    <p>{!! nl2br(e($m->content)) !!}</p>
                    @endif
                    <div class="photo">
                        
                        @if (!empty($m->post_picture))

                         <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$m->post_picture)}}"alt="写真を挿入">
 
                        @endif
                    </div>
                </div>
                <div>
                </div>
            </div>
            </li>
@endforeach