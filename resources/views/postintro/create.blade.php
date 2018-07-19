<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')

    <h1>紹介文投稿ページ</h1>

    {!! Form::model($intro,['route' =>'postintro.store','method' =>'post','files' => 'true','enctype'=>'multipart/form-data']) !!}

        {!! Form::label('touser_id', '@') !!}
        {!! Form::text('touser_id') !!}
        {!! Form::label('touser_id', 'さんへ')!!}
        
        {!! Form::label('content', '紹介文:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}
        
        
        <div class="form-group">
            {!!Form::label('file','画像アップロード',['class'=>'control-label']) !!}
            {!!Form::file('file')!!}
        </div>
    {!! Form::close() !!}

@endsection