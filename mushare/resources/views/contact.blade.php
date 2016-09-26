<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

    @if(empty($nummers))
        Er zijn geen nummers
    @else
        De volgende nummers zijn opgeslagen:
    @endif

    @foreach($nummers as $nummer)
        <li>{{$nummer}}</li>
    @endforeach

</body>
</html>
