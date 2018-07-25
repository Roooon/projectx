@extends('layouts.app')

@section('content')

    <h1>自己紹介編集ページ</h1>
    
    <div class="edit_jikoshoukai">
    
    {!! Form::model($profile, ['route' => ['profile.update','id'=>$id],'method'=>'put']) !!}
        <ul>
        生年月日<div><input type="date" name="birthdate"></div>
        趣味<p><textarea class="hob" cols="20" name="hobby" placeholder="趣味" rows="2"></textarea></p>
        一言<p>
        <textarea class="appeal" cols="30" name="appeal" placeholder="一言書こう！" rows="2"></textarea>
        </p>
        <div>{!! Form::submit('確定') !!}</div>
        
        </ul>
    {!! Form::close() !!}
    
    </div>

@endsection