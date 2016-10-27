@extends('layouts.app')

@section('content')

    {{$mysongs = DB::table('songs')->where('users_id', '=',Auth::user()->id)->get()}}
    @foreach($user->songs as $mysongs)
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


        <h5> Likes : {{$likes = DB::table('likeables')->where('likeable_id', $mysongs->id)->count()}} | Dislikes : {{$dislikes = DB::table('dislikeables')->where('dislikeable_id', $mysongs->id)->count()}} </h5>
    </ul>
@stop

