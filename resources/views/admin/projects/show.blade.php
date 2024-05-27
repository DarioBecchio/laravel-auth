@extends('layouts.admin')

@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$project->title}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.projects.index')}}">
            <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Posts</a>
    </div>
</header>



<div class="container mt-5">
    <div class="row">
        <div class="col">
        @if (Str::startsWith($project->cover_image, 'https://'))
            <img loading="lazy" class="card-img-top" src="{{$project->cover_image}}" alt="">
            @else
            <img loading="lazy" class="card-img-top" src="{{ asset('storage/' . $project->cover_image) }}">
            @endif
        </div>
        </div>
    </div>
    <div class="col">

            <div class="metadata">
                <strong>Category</strong> {{$project->category ? $project->category->name : 'Uncategorized'}}
            </div>
            <div>{{$project->content}}</div>

        </div>


</div>

                    
                    

@endsection