@extends('layouts.master')

@section('title')
    All Photos
@stop

@section('content')

    <h1>All Photos</h1>

    @if(sizeof($photos) == 0)
        You have not added any photos.
    @else
        @foreach($photos as $photo)
            <div>
                <h2>{{ $photo->title }}</h2>
                <a href='/photos/edit/{{$photo->id}}'>Edit</a> |
                <a href='/photos/confirm-delete/{{$photo->id}}'>Delete</a><br>
                <img src='{{ $photo->imageurl }}'>
            </div>
        @endforeach
    @endif

@stop
