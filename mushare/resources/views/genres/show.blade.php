@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($genre->songs as $song)



              <h1>{{ $song->name }}</h1>
                <ul class="list-group">

                    <li class="list-group-item"> Artiest : {{ $song-> artist}}</li>
                    <li class="list-group-item">{{ $song-> link}}</li>
                    <li class="list-group-item">{{ $song-> extra}}</li>
                    <li class="list-group-item">{{ $genre-> name }}</li>
                    <li class="list-group-item>"> Likes : {{$likes = DB::table('likeables')->where('likeable_id', $song->id)->count()}} </li>
                    <li class="list-group-item>"> Dislikes : {{$likes = DB::table('dislikeables')->where('dislikeable_id', $song->id)->count()}} </li>
                    <button class="btn"><a href="{{ route('product.like', $song->id) }}">Like</a></button>
                    <button class="btn"><a href="{{ route('product.dislike', $song->id) }}">Dislike</a></button>
                </ul>

                <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                </div>

            @endforeach


            <h3> Add a new song</h3>
                <form method="POST" action="/genres/{{ $genre->id }}/notes">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="genre_id" value="{{ $genre -> id }}">
                    <input type="hidden" name="users_id" value="{{ $user -> id }}">
                    Name: <input type="text" name="name"><br>
                    Artist: <input type="text" name="artist"><br>
                    Paste a youtube link: <input type="text" name="link"><br>
                    Extra information: <input type="text" name="extra"><br>
                    <button type="submit" class="btn"> Add song</button>
                </form>
        </div>
    </div>


@stop
