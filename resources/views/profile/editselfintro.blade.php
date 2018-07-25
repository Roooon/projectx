@extends('layouts.app')

@section('content')

    <h1>自己紹介編集ページ</h1>
    
    {!! Form::model($profile, ['route' => ['profile.update','id'=>$id],'method'=>'put']) !!}
        <ul>
        <div>{!! Form::label('birthday','　生年月日　') !!}<input type="date" name="birthdate"></div>
        <div>{!! Form::label('hobby','　趣味　') !!}{!! Form::text('hobby') !!}</div>
        <div>{!! Form::label('appeal', '　一言　') !!}{!! Form::text('appeal') !!}</div>
        <div>{!! Form::submit('確定') !!}</div>
        </ul>
    {!! Form::close() !!}

@endsection