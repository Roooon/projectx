<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')

    <h1>スキル投稿ページ</h1>

    {!! Form::model($skills, ['route' => 'skills.store']) !!}

        {!! Form::label('touser_id', '@') !!}
        {!! Form::text('touser_id') !!}
        {!! Form::label('touser_id', 'さんへ')!!}
        
        {!! Form::label('content', 'スキル紹介文:') !!}
        {!! Form::text('content') !!}
 
        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection