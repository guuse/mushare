@extends('layouts.app')

@section('content')


            {{ $song->name }}
            {{ $song->artist }}
            {{ $song->link }}
            {{ $song->extra }}
            {{ $song->upvote }}
            {{ $song->downvote }}

            {{ $genre }}
            {{ $song->genres_id }}








@stop
