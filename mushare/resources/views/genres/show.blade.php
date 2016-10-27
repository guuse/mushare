@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1> {{ $genre-> name }} </h1>
            @foreach($genre->songs as $song)


                <ul class="list-group">
                    <h3> {{ $song->name }}</h3>
                    <h5> {{ $song-> artist}}</h5>
                    @if ($song->extra)
                        <h5>{{ $song-> extra}}</h5>
                    @endif
                    <h5>Uploaded by : {{$user->name}}</h5>

                    <h4 style="font-size: 0px">{{ $link = $song->link }}</h4>

                    <?php
                    $embed = Embed::make($link)->parseUrl();
                    if ($embed) {
                        $embed->setAttribute(['width' => 600]);
                        echo $embed->getHtml();
                    }
                    ?>


                    <li class="list-group-item>"> Likes : {{$likes = DB::table('likeables')->where('likeable_id', $song->id)->count()}} </li>
                    <li class="list-group-item>"> Dislikes : {{$dislikes = DB::table('dislikeables')->where('dislikeable_id', $song->id)->count()}} </li>
                    <button class="btn"><a href="{{ route('product.like', $song->id) }}">Like</a></button>
                    <button class="btn"><a href="{{ route('product.dislike', $song->id) }}">Dislike</a></button>
                    <li class="list-group-item">Uploaded by : {{$user->name}}</li>
                </ul>

                {{--<div class="onoffswitch">--}}
                    {{--<form method="post" action="">--}}
                        {{--<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>--}}
                        {{--<label class="onoffswitch-label" for="myonoffswitch">--}}
                            {{--<span class="onoffswitch-inner"></span>--}}
                            {{--<span class="onoffswitch-switch"></span>--}}
                        {{--</label>--}}
                        {{--<input type="submit">--}}
                    {{--</form>--}}
                {{--</div>--}}

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
