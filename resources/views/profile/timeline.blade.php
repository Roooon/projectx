 @foreach ($merged as $m)
            <?php
            $user = App\User::find($m->user_id);
            ?>
            <li class="media">
            <div class="media-body post-layout">
                @if($m->type == "intro")
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}の紹介文を書いたよ！ {{ $m->created_at }}</span>
                </div>
                @else
                <div>
                    {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">が {!! link_to_route('profile.show', App\User::find($m->touser_id)->email, ['id' => $m->touser_id]) !!}のスキルについて書いたんご！ {{ $m->created_at }}</span>
                </div>
               @endif
                <div>
                    <p>{!! nl2br(e($m->content)) !!}</p>
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