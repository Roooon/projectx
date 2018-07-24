<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')
　　<div class="title">
    <h1>紹介文投稿ページ</h1>
{{$post_user->email}}さんへ
    </div>

    {!! Form::model($intro,['route' =>'postintro.store','method' =>'post','files' => 'true','enctype'=>'multipart/form-data'],['class' => 'introform']) !!}
    
        <textarea class="write_intro" cols="30" name="content" placeholder="content" rows="10"></textarea>
{{Form::hidden('touser_id', $post_user->id)}}
        
        
        
        <div class="post_content">
            <label for="file" class="control-label">画像アップロード</label>
            <input class="input_pic" name="file" type="file" id="file">
            <input type="submit" value="投稿">
        </div>
        
        
        
    {!! Form::close() !!}

@endsection