@extends('layouts.app')

@section('content')

    <li role="presentation" class="{{ Request::is('users/*/follows') ? 'active' : '' }}"><a href="{{ route('users.follows', ['id' => $user->id]) }}">Follows <span class="badge">{{ $count_follows }}</span></a></li>

@endsection