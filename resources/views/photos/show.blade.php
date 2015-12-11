@extends('layouts.master')

@section('title')
    Show photo
@stop


@section('head')
@stop

@section('content')

    @if(!isset($title))
        <h1>No photo has been selected to display!</h1>
    @else
        <h1>Show photo: {{ $title }}</h1>
    @endif

@stop

@section('body')

@stop
