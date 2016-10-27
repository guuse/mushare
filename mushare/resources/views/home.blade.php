@extends('layouts.app')

@section('content')
    <div style="
                align-items: center;
                display: flex;
                justify-content: center;
                text-align: center;
            }">

    <ul class="list-group">
        <h3> {{ $newest-> name }}</h3>
        <h5> {{ $newest-> artist}}</h5>
        @if ($newest-> extra)
            <h5>{{ $newest-> extra}}</h5>
        @endif

        <h4 style="font-size: 0px">{{ $link = $newest->link }}</h4>

        <?php
        $embed = Embed::make($link)->parseUrl();
        if ($embed) {
            $embed->setAttribute(['width' => 600]);
            echo $embed->getHtml();
        }
        ?>


        <h5> Likes : {{$likes = DB::table('likeables')->where('likeable_id', $newest->id)->count()}} | Dislikes : {{$dislikes = DB::table('dislikeables')->where('dislikeable_id', $newest->id)->count()}} </h5>
    </ul>
    </div>
@endsection
