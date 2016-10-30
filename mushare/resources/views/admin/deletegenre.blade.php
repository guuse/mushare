@extends('layouts.app')

@section('content')
    <h1>Are you sure you want to delete the genre {{$genre->name}}?</h1>

    <form method="POST" action="/admin/{{$genre->id}}/delete">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="{{$genre->id}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <a href="/admin">Go back</a><br>
        <button type="submit" class="btn.danger">Delete genre</button>
    </form>
@stop
