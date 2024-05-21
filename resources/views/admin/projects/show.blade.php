@extends('layouts.admin')

@section('content')

<div class="container">
    <img src="{{$project->cover_image}}" alt="">
    <td>{{$project->title}}</td>
    <td>{{$project->slug}}</td>
</div>

                    
                    

@endsection