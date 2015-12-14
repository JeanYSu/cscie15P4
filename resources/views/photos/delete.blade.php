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
        <h4>
            <a href='/photos/delete/{{$photo->id}}'><span class="label label-primary">Yes!</span></a>
            <a href='/photos/edit/{{$photo->id}}'><span class="label label-primary">Cancel</span></a>
        </h4>
    </p>


@stop
