@extends('layouts.app')

@section('content')
<div class="text-logo">
    <a href='/' class='title_title'><h4>Takocil</h4></a>
    </div>
    <div class="text-center">
        <h1>LOGIN</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
            
             <div class="form-group">
                    {!! Form::label('email', 'Name') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('HELLO', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            <p>New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
@endsection