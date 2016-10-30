@extends('layouts.app')

@section('content')
    <h1>Admin panel</h1>

    <h2>All users</h2>
    <h3> Search user</h3>
    <form method="get" action="/admin/search">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        Username: <input type="text" name="searched" required><br>
        <button type="submit" class="btn"> Search</button>
    </form>
    @foreach($users as $user)


        <div>


            <h4><a href="/admin/user/{{ $user->id }}/edit">{{ $user->name }}</a></h4>

        </div>

    @endforeach

    <h2>All genres</h2>
    @foreach($genres as $genre)


        <div>
            <h4>{{ $genre->name }}</h4>
            <h6><a href="/admin/{{ $genre->id }}/edit">Edit genre</a></h6>
            <h6><a href="/admin/{{ $genre->id }}/delete">Delete genre</a></h6>
        </div>

    @endforeach




    <h3> Add a new genre</h3>
    <form method="POST" action="/admin/addgenre">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        Genre name: <input type="text" name="name" value="{{old('name')}}"><br>
        <button type="submit" class="btn"> Add genre</button>
    </form>
    @if(count($errors))
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
@endsection
