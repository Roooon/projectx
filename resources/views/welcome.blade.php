@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                HELLO
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to ProjectX</h1>
                SIGN UP
            </div>
        </div>
    @endif
@endsection