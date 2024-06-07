
@extends('layouts.admin')

@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Create a wonderful post
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Cancel</a>
    </div>
</header>

<div class="container">
    <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titleHelper"
                placeholder="Learn Laravel"
            />
            <small id="helpId" class="form-text text-muted">Add the project title here</small>
        </div>
        
        <div class="d-flex gap-2 flex-wrap">
        @foreach ($technologies as $technology)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="technology-{{$technology->id}}" name="technologies[]"/>
                <label class="form-check-label" for="technology-{{$technology->id}}"> {{$technology->name}} </label>
            </div>
        @endforeach
        </div>
       

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select
                class="form-select"
                name="category_id"
                id="category_id"
            >
                <option selected disabled>Select one</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        


        <div class="mb-3">
            <label for="cover_image" class="form-label">Upload cover image</label>
            <input
                type="file"
                class="form-control"
                name="cover_image"
                id="cover_image"
                aria-describedby="coverImageHelper"
                placeholder="coverImage"
            />
            <div id="coverImageHelper" class="form-text">Upload cover image</div>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5" >{{old('content')}}</textarea>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Create
        </button>
        


    </form>
</div>
@endsection