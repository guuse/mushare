@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>

    <form method="POST" action="/admin/user/{{$user->id}}">
        {{method_field('PATCH')}}
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        Name: <input type="text" name="name" value="{{$user->name}}"><br>
        Admin: <input type="number" name="admin" value="{{$user->admin}}"><br>
        <button type="submit" class="btn">Update user</button>


    </form>

    <a href="/admin">Go back</a><br>

@stop
