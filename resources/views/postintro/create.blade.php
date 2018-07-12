<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')

    <h1>紹介文投稿ページ</h1>

    {!! Form::model($intro, ['route' => 'postintro.store']) !!}

        {!! Form::label('content', '@') !!}
        {!! Form::text('content') !!}
        {!! Form::label('content', 'さんへ')!!}
        
        {!! Form::label('content', '紹介文:') !!}
        {!! Form::text('level') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection