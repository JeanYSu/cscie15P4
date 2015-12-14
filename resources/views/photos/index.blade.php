@extends('layouts.master')

@section('title')
    All Photos
@stop

@section('homemenu')
  class="active"
@stop
@section('addkidmenu')

@stop
@section('addphotomenu')

@stop

@section('content')

    <h1>All Kidz Photos</h1>

    @if(sizeof($photos) == 0)
        You have not added any photos.

        @if(sizeof($kids) == 0)
            <br>
            Before you add a photo, please create a kid's record first.
            <br>
            This will allow you to associate a photo moment to your kid.
            <a href='/kids/add'>Add a kid</a>
        @else
            <br>
            Please add a photo from <a href='/photos/add'>here</a>.
        @endif

    @else
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Kid's Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{ $photo->title }}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach($photo->tags as $tag)
                                        <li class="list-group-item">
                                            {{$tag->name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$photo->kid->name }}</td>
                            <td>
                                <img src='{{ $photo->image_url }}' style='width:100px' class="img-thumbnail">
                            </td>
                            <td>
                                <a href='/photos/edit/{{$photo->id}}'>Edit</a> |
                                <a href='/photos/confirm-delete/{{$photo->id}}'>Delete</a><br>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
@section('body')
@stop
