@extends('layouts.master')

@section('title')
    Add Photo
@stop

@section('head')
@stop



@section('content')

    <h1>Add a new photo</h1>
    @include('layouts.errors')

    <form method='POST' action='/photos/add'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{ old('title','One naghty kid photo') }}'
            >
        </div>

        <div class='form-group'>
            <label for='kid'>* Kid:</label>
            <select name='kid' id='kid'>
                @foreach($kids_for_dropdown as $kid_id => $kid_name)
                    <option value='{{ $kid_id }}'> {{ $kid_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='image_url'>* Photo (URL):</label>
            <input
                type='text'
                id='image_url'
                name="image_url"
                value='{{ old('image_url','http://prodimage.images-bn.com/pimages/9780394800165_p0_v4_s118x184.jpg') }}'
                >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag_name)
                <input type='checkbox' name='tags[]' value='{{ $tag_id }}'> {{ $tag_name }}<br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Add photo</button>
    </form>

@stop

@section('body')
@stop
