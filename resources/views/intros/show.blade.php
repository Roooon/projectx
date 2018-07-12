@extends('layouts.app')

@section('content')

    <h1>INTRO</h1>
    
    <p>{{ $intro->user_id }}が{{ $intro->touser_id }}に紹介文を書きました。</p>

    <p>{{ $intro->content }}</p>

@endsection