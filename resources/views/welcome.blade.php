@extends('layouts.app')

@section('content')

@if (\Auth::check())
<div>

        <div class id="main">
        @if (\Auth::check()) 
            <ul class="media-list">

    @include('profile.timeline')           
        

        <aside id="dashboard">
                @include('users.timeline_profile')
                
        </aside>
        <div class="col-xs-8 row" id="main">
            <ul class="media-list media-background">
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

        <h2>友人があなた、あなたが友人のキャラを発信する新しいSNSのカタチ。</h2>
            
        <div class="col-sm-6">{!! link_to_route('signup.get', 'SIGN UP', null, ['class' => 'newyorkbtns']) !!}</div>
        <div class="col-sm-6">{!! link_to_route('login', 'LOGIN', null, ['class' => 'newyorkbtnl']) !!}</div>
        
        <!--<img alt="More" class="yazirusi" src="https://de7iszmjjjuya.cloudfront.net/assets/about/root/ic_chevron_bottom-3df843a38d23002d647276c1ff79901a834bd926f74e81ae4753e4565483b577.png" width="24" height="24">-->
            <span class="glyphicon glyphicon-menu-down"></span>
            <p>MORE ABOUT</p>

       
    </div>
    
    <div class="container">
        <h3>紹介文で知る、あの人、じぶん</h3></a>
        <div class="col-sm-4">
           <div class="waku">
            <h3>みつける</h3>
            <span class="search glyphicon glyphicon-search"></span>
            <p>
                友人を見つけて
                <br>
                その人のキャラクターをみてみよう
            </p>
            </div>
            </div>
            
        <div class="col-sm-4">
           <div class="waku">     
            <h3>知る</h3>
            <span class="know glyphicon glyphicon-user"></span>
            <p>
                紹介文で友人のキャラクターを知ったら
                <br>
                友人のスキルを通して、新たな一面を知ろう
            </p>
            </div>
            </div>
            
        <div class="col-sm-4">
           <div class="waku">
            <h3>つたえる</h3>
            <span class="share glyphicon glyphicon-thumbs-up"></span>
            <p>
                友人の新たな一面を知ったら
                <br>
                その友人をみんなに紹介して、魅力をつたえよう
            </p>
            </div>
        </div>
    </div>
            
@endif
@endsection