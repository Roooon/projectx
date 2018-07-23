@extends('layouts.app')

@section('content')

<div>
        <div class="col-xs-8 row" id="main">
        @if (\Auth::check()) 
            <ul class="media-list">

    @include('profile.timeline')           
        
            </ul>
        </div>

        <aside id="sidebar">
    @include('users.recommended_user')        
        </aside>
</div>

@else
    <div class="text-center">
        <h1>知らなかった、あの人のコト</h1>
        <!--<h3>通知表に怯えてた幼少期。自己分析で必死だった就活。毎日伺う上司の顔色。インスタ映え。</h3>-->
        <h2>友人があなた、あなたが友人をシェアするSNSの新しいカタチ。</h2>
        
        <div class="row botan">
            
        <div class="col-sm-6">{!! link_to_route('signup.get', 'SIGN UP', null, ['class' => 'newyorkbtns']) !!}</div>
        <div class="col-sm-6">{!! link_to_route('login', 'LOGIN', null, ['class' => 'newyorkbtnl']) !!}</div>
        </div>
        
        <img alt="More" class="yazirusi" src="https://de7iszmjjjuya.cloudfront.net/assets/about/root/ic_chevron_bottom-3df843a38d23002d647276c1ff79901a834bd926f74e81ae4753e4565483b577.png" width="24" height="24">
        
        <p>
            MORE ABOUT
        </p>
       
    </div>
@endif
@endsection