@extends('layouts.master')

@section('title')
    Edit Kid
@stop

@section('homemenu')

@stop
@section('addkidmenu')
    class="active"
@stop
@section('addphotomenu')

@stop

@section('content')

    <h1>Edit Kid</h1>

    @include('layouts.errors')

    <form method='POST' action='/kids/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $kid->id }}'>

        <div class='form-group'>
            <label for='name'>* Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{$kid->name}}'
            >
        </div>

        <div class='form-group'>
            <label for='gender'>* Gender:</label>
            <select name='gender' id='gender'>
                @foreach($genders_for_dropdown as $gender_id => $gender_name)
                    {{ $selected = ($kid->gender == $gender_id) ? 'selected' : '' }}
                    <option value='{{ $gender_id }}' {{ $selected }}> {{ $gender_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='family_code'>* Family Code:</label>
            <input
                type='text'
                id='familiy_code'
                name='family_code'
                value='{{$kid->family_code}}'
            >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@stop
