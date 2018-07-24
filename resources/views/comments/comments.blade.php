@extends('layouts.app')

@section('content')

{!! Form::model($skills, ['route' => 'skillcomments.store']) !!}
        
        {!! Form::label('comment','コメント :') !!}
        {!! Form::text('comment') !!}

        {!! Form::submit('投稿') !!}
{!! Form::close() !!}

@endsection