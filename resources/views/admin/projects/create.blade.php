
@extends('layouts.admin')

@section('content')

<div class="container">
    <form action="{{route('admin.projects.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Title</label>
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
        
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
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