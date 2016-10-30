@extends('layouts.app')

@section('content')
    <h1>Admin panel</h1>

    <h3>All users with: {{$request -> searched}}</h3>

        @foreach($users as $user)
        <div>
        <h4><a href="/admin/user/{{ $user->id }}/edit">{{ $user->name }}</a></h4>
        </div>
        @endforeach


    <a href="/admin">Go back</a><br>


@endsection
