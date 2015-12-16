@extends('layouts.master')

@section('title')
    Add Kid
@stop

@section('head')
@stop

@section('homemenu')

@stop
@section('addkidmenu')
    class="active"
@stop
@section('addphotomenu')

@stop

@section('content')
    <h1>Add a new kid</h1>
@include('layouts.errors')

{!! Form::open(array('url'=>'kids/add','method'=>'POST', 'files'=>true)) !!}
<div class="control-group">
    <div class="controls">
        {!! Form::label('* Name:') !!}
        {!! Form::text('name', null, array('placeholder'=>'')) !!}
    </div>
    <div class="controls">
        {!! Form::label('* Gender:') !!}
        {!! Form::select('gender', array('' => '','F' => 'Female', 'M' => 'Male', 'N' => 'Preferred not to tell'), '') !!}
    </div>
    <div class="controls">
        {!! Form::label('* Family Code:') !!}
        {!! Form::text('family_code', null, array('placeholder'=>'')) !!}
    </div>
    <div class="controls">
        {!! Form::label('Kid Avatar:') !!}
        {!! Form::file('image') !!}
        <br>
    </div>
</div>
{!! Form::submit('Add Kid', array('class'=>'btn btn-primary')) !!}
{!! Form::close() !!}

<form method='POST' action='/kids/addcode'>
    <h1>OR</h1>
    <input type='hidden' value='{{ csrf_token() }}' name='_token'>
    <div class="form-group">
        {!! Form::label('* Add a kid with family code:') !!}
        {!! Form::text('family_code', null, array('placeholder'=>'')) !!}
    </div>
    <button type="submit" class="btn btn-primary">Add kid with family code</button>
</form>
@stop

@section('body')
@stop
