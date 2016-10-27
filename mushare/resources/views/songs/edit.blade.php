@extends('layouts.app')

@section('content')
    <h1>edit the song</h1>

    <form method="POST" action="/songs/{{$song->id}}">
        {{method_field('PATCH')}}
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        Name: <input type="text" name="name" value="{{$song->name}}"><br>
        Artist: <input type="text" name="artist" value="{{$song->artist}}"><br>
        Paste a youtube link: <input type="text" name="link" value="{{$song->link}}"><br>
        Extra information: <input type="text" name="extra" value="{{$song->extra}}"><br>
        <button type="submit" class="btn">Update song</button>
    </form>
@stop
