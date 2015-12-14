@extends('layouts.master')

@section('title')
    Show Kid
@stop

@section('homemenu')

@stop
@section('addkidmenu')
    class="active"
@stop
@section('addphotomenu')

@stop

@section('head')
@stop

@section('content')

    @if(!isset($name))
        <h1>No photo has been selected to display!</h1>
    @else
        <h1>Show photo: {{ $name }}</h1>
    @endif

@stop

@section('body')

@stop
