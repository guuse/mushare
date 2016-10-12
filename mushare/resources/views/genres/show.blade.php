@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($genre->songs as $song)



              <h1>{{ $song->name }}</h1>
                <ul class="list-group">
                    <li class="list-group-item">{{ $song-> artist}}</li>
                    <li class="list-group-item">{{ $song-> link}}</li>
                    <li class="list-group-item">{{ $song-> extra}}</li>
                    <li class="list-group-item">{{ $genre-> name }}</li>
                </ul>





            @endforeach


            <h3> Add a new song</h3>
                <form method="POST" action="/genres/{{ $genre->id }}/notes">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="genre_id" value="{{ $genre -> id }}">
                    Name: <input type="text" name="name"><br>
                    Artist: <input type="text" name="artist"><br>
                    Paste a youtube link: <input type="text" name="link"><br>
                    Extra information: <input type="text" name="extra"><br>
                    <button type="submit" class="btn"> Add song</button>
                </form>
        </div>
    </div>
@stop
