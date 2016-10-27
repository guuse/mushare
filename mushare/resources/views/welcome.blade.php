<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Mushare
                </div>

                <ul class="list-group">
                    <h3> {{ $newest->name }}</h3>
                    <h5> {{ $newest-> artist}}</h5>
                    @if ($newest->extra)
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
        </div>
    </body>
</html>
