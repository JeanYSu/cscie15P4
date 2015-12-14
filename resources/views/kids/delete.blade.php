@extends('layouts.master')

@section('title')
    Delete Kid
@stop

@section('homemenu')

@stop
@section('addkidmenu')
    class="active"
@stop
@section('addphotomenu')

@stop

@section('content')

    <h1>Delete Kid</h1>

    <p>
        Are you sure you want to delete <em>{{$kid->name}}</em>?
    </p>

    <p>
        <h4>
            <a href='/kids/delete/{{$kid->id}}'><span class="label label-primary">Yes!</span></a>
            <a href='/kids/edit/{{$kid->id}}'><span class="label label-primary">Cancel</span></a>
        </h4>
    </p>


@stop
