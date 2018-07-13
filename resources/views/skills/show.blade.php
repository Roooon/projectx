@extends('layouts.app')

@section('content')

    <h1>SKILL</h1>
    
    <p>{{ $skill->user_id }}が{{ $skill->touser_id }}のスキルを追加しました。</p>

    <p>{{ $skill->content }}</p>

@endsection