@extends('layouts.app')

@section('content')
    <h1>
        All Genres
    </h1>

    @foreach($genres as $genre)


        <div>

            <a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a>

        </div>

    @endforeach
@endsection
