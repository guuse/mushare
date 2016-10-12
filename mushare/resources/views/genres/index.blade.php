@extends('layouts.app')

@section('content')
    <h1>
        All Genres
    </h1>

    @foreach($genres as $genre)


        <div>

                {{ $genre->name }}

        </div>

    @endforeach
@endsection
