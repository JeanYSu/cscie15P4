@extends('layouts.master')

@section('title')
    Edit Photo
@stop


@section('content')

    <h1>Edit Photo</h1>

    @include('layouts.errors')

    <form method='POST' action='/photos/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $photo->id }}'>

        <div class='form-group'>
            <label for='title'>* Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{$photo->title}}'
            >
        </div>

        <div class='form-group'>
            <label for='kid'>* Kid:</label>
            <select name='kid' id='kid'>
                @foreach($kids_for_dropdown as $kid_id => $kid_name)
                    {{ $selected = ($kid_id == $photo->kid->id) ? 'selected' : '' }}
                    <option value='{{ $kid_id }}' {{ $selected }}> {{ $kid_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='image_url'>* Image (URL):</label>
            <input
                type='text'
                id='image_url'
                name="image_url"
                value='{{$photo->image_url}}'
                >
        </div>
        <div class='form-group'>
            <img src='{{ $photo->image_url }}' style='width:150px'>
        </div>


        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag)
                <?php $checked = (in_array($tag['name'],$tags_for_this_photo)) ? 'CHECKED' : '' ?>
                <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['name'] }}<br>
            @endforeach
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@stop
