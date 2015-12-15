@extends('layouts.master')

@section('title')
    Add Photo
@stop

@section('head')
@stop
@section('homemenu')

@stop
@section('addkidmenu')

@stop
@section('addphotomenu')
    class="active"
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
                value='{{ old('title','My kidz moment') }}'
            >
        </div>

        <div class='form-group'>
            <label for='kid'>* Kid:</label>
            <select name='kid' id='kid'>
                @foreach($kids_for_dropdown as $kid_id => $kid_name)
                    <option value='{{ $kid_id }}' @if (old('kid') == $kid_id) selected="selected" @endif> {{ $kid_name }} </option>
                 @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='image_url'>* Photo (URL):</label>
            <input
                type='text'
                id='image_url'
                name="image_url"
                value='{{ old('image_url','http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083429/49e74c963945427f8d0dfb37924c948f.jpg') }}'
                >
        </div>


        <div class='form-group'>
            <label for='tags'>Tags:</label>
                @foreach($tags_for_checkbox as $tag_id => $tag)
                    <?php
                        $checked = '';
                        if(old('tags')){
                            $checked = (in_array($tag['id'], old('tags')) ? 'CHECKED' : '');
                        }
                    ?>
                    <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag['id']}}'>{{ $tag['name'] }}
                    <br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add photo</button>
    </form>

@stop

@section('body')
@stop
