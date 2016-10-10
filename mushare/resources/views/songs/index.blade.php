@extends('layouts.app')

@section('content')
    <h1>
        All songs
    </h1>

    @foreach($songs as $song)


        <div>
                {{ $song->name }}
                {{ $song->artist }}
                {{ $song->link }}
                {{ $genre }}

        </div>

    @endforeach
@endsection
