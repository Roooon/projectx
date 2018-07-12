@extends('layouts.app')

@section('content')
    @include('users.userprofile', ['users' => $users])
@endsection

<!----same as micropost users.index-->