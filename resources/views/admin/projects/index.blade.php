@extends('layouts.admin')

@section('content')

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
                    <td scope="row">{{project->id}}</td>
                    <td><img src="{{project->cover_image}}" alt=""></td>
                    <td>{{project->title}}</td>
                    <td>{{project->slug}}</td>
                    <td><a href="{{route(admin.projects.show , $project}}">View</a></td>
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