@extends('layouts.app')

@section('content')
    <h1>edit the genre</h1>

    <form method="POST" action="/admin/{{$genre->id}}">
        {{method_field('PATCH')}}
        <input type="hidden" name="id" value="{{$genre->id}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        Name: <input type="text" name="name" value="{{$genre->name}}"><br>
        <button type="submit" class="btn">Update genre</button>
    </form>

    <a href="/admin">Go back</a><br>

@stop
