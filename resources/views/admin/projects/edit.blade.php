
@extends('layouts.admin')

@section('content')

<div class="container">
    <form action="{{route('admin.projects.update' , $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titleHelper"
                placeholder="Learn Laravel"
                value="{{old('title',$project->title)}}"
            />
            <small id="helpId" class="form-text text-muted">Add the project title here</small>
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
                <option value="{{$category->id}}" {{ $category->id == old('category_id', $project->category?->id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="d-flex gap-3">
            <img width="140" src="{{asset('storage/' . $project->cover_image)}}" alt="">
            <div class="mb-3">
                <label for="cover_image" class="form-label">Upload another cover image</label>
                <input
                    type="file"
                    class="form-control"
                    name="cover_image"
                    id="cover_image"
                    aria-describedby="coverImageHelper"
                    placeholder="coverImage"
                />
                <div id="coverImageHelper" class="form-text">Upload another cover image</div>
            </div>
        </div>
       
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3" >{{old('content',$project->content)}}</textarea>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Update
        </button>
        


    </form>
</div>
@endsection