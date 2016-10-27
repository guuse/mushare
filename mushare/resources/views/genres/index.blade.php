@extends('layouts.app')

@section('content')
    <h1>
        All Genres
    </h1>

    @foreach($genres as $genre)


        <div>

            <h3><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></h3>

        </div>

    @endforeach
@endsection
