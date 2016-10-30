@extends('layouts.app')

@section('content')

    @foreach($user->song as $mysongs)
    <ul class="list-group">
        <h3> {{ $mysongs-> name }}</h3>
        <h5> {{ $mysongs-> artist}}</h5>
        @if ($mysongs-> extra)
            <h5>{{ $mysongs-> extra}}</h5>
        @endif

        <h4 style="font-size: 0px">{{ $link = $mysongs->link }}</h4>

        <?php
        $embed = Embed::make($link)->parseUrl();
        if ($embed){
            $embed->setAttribute(['width' => 600]);
            echo $embed->getHtml();
        }
        ?>

        <a href="{{route('edit', ['song'=>$mysongs->id])}}">Edit this song</a>



        <h5> Likes : {{$likes = DB::table('likeables')->where('likeable_id', $mysongs->id)->count()}} | Dislikes : {{$dislikes = DB::table('dislikeables')->where('dislikeable_id', $mysongs->id)->count()}} </h5>
    </ul>
    @endforeach
@stop

