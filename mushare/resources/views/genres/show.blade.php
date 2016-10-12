@extends('layouts.app')

@section('content')

    @foreach($genre->songs as $song)



      <h1>{{ $song->name }}</h1>
        <ul>
            <li>{{ $song-> artist}}</li>
            <li>{{ $song-> link}}</li>
            <li>{{ $song-> extra}}</li>
            <li>{{ $genre-> name }}</li>
        </ul>


    @endforeach

@stop
