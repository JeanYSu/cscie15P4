@extends('layouts.master')

@section('title')
    Delete Photo
@stop


@section('content')

    <h1>Delete Photo</h1>

    <p>
        Are you sure you want to delete <em>{{$photo->title}}</em>?
    </p>

    <p>
        <a href='/photos/delete/{{$photo->id}}'>Yes!</a>
    </p>

@stop
