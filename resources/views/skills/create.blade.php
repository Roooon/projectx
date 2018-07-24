<!--紹介文を投稿する（create）-->

@extends('layouts.app')

@section('content')
    <div class="title">
    <h1>スキル投稿ページ</h1>
    
    
{{$post_user->email}}さんへ

</div>
    {!! Form::model($skills, ['route' => 'skills.store']) !!}
    <textarea class="write_skill" cols="10" name="skillname" placeholder="スキル名" rows="1"></textarea>
    
    <div class="post_content_skill">
    <textarea class="write_skill_detail" cols="100" name="content" placeholder="スキル詳細" rows="10"></textarea>
    <input class="post_skill" type="submit" value="投稿">
</div>
     

    {!! Form::close() !!}

@endsection