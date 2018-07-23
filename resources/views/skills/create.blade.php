<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')

    <h1>スキル投稿ページ</h1>
    
{{$post_user->email}}さんへ

    {!! Form::model($skills, ['route' => 'skills.store']) !!}
        
        {!! Form::label('skillname','スキル名 :') !!}
        {!! Form::text('skillname') !!}
        {!! Form::label('content', 'スキル詳細:') !!}
        {!! Form::text('content') !!}
     {{Form::hidden('touser_id', $post_user->id)}}
        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection