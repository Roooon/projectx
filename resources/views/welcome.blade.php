@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                 
                  
                
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>小さいスキルを世界へ</h1>
                <h2>ProjectXへようこそ</h2>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection