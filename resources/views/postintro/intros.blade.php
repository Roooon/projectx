<ul class="media-list">
@foreach ($intros as $intro)
    <?php $user = $intro->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('profile.show', $user->email, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $intro->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($intro->content)) !!}</p>
            </div>
            <div>
               
                @if (!empty($intro->post_picture))

                 <img class="media-object img-rounded img-responsive" src="{{asset('storage/images/'.$intro->post_picture)}}"alt="写真を挿入">
 
                @endif
                
                 @if (Auth::user()->id == $intro->user_id)
                    {!! Form::open(['route' => ['postintro.destroy', $intro->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $intros->render() !!}