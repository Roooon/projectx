@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
@foreach ($list as $item)
             <tr>
                <td><a href="{{ route('user.profile', ['email' => $user->email]) }}">{{$item->email}}</a></td>
            </tr>
@endforeach
        </tbody>
    </table>
@endsection

    