

@extends('layouts.app')


@section('content')

    <h1>スキル新規作成ページ</h1>    
    <div class="row"
        <div class="col-xs-12  col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">

    {!! Form::model($skills, ['route' => 'skills.store']) !!}

        <div class="form-group">
         {!! Form::label('skill', 'スキル:') !!}
         {!! Form::text('skill', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
         {!! Form::label('skillex', 'スキル説明:')  !!}
         {!! Form::text('skillex', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
         {!! Form::label('towhom', '誰に:')  !!}
         {!! Form::text('towhom', null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

        </div>
    </div>

@endsection 