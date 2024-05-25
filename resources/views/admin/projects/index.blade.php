@extends('layouts.admin')

@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Projects
        </h1>
        <a class="btn btn-primary" href="{{route('admin.projects.create')}}">Create</a>
    </div>
</header>

<div
    class="table-responsive"
>
    <table
        class="table table-light"
    >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Cover_image</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse($projects as $project)
            
                <tr class="">
                    <td scope="col">{{$project->id}}</td>
                    <td scope="col"><img src="{{$project->cover_image}}" alt=""></td>
                    <td scope="col">{{$project->title}}</td>
                    <td scope="col">{{$project->slug}}</td>
                    <td scope="col"><a href="{{route('admin.projects.show' , $project)}}">Views</a></td>
                </tr>
            @empty
                <tr class="">
                    <td scope="row" colspan="4">No records to show</td>
                </tr>
            @endforelse
            
            
        </tbody>
    </table>
</div>

@endsection