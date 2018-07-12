@extends('layouts.app')

@section('content')
    @include('users.userprofile', ['users' => $users])
@endsection