<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //dd($request->all());
        $val_data = $request->validated();
        //dd($val_data);
        $val_data['slug'] = Str::slug($request-> title , '-');
        if ($request->has('cover_image')) {

            $image_path = Storage::put('uploads', $request->cover_image);
            //dd($image_path);
            $val_data['cover_image'] = $image_path;
        }
        Project::create($val_data);

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        
        return view('admin.projects.edit' , compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //dd($request->all());
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request-> title , '-'); 
        if($request->has('cover_image')){
                //check if the current post has an image
                if ($project->cover_image){
                //if so, delete it   
                Storage::delete($project->cover_image);
                }
                
                //upload the new image
                $image_path = Storage::put('uploads', $request->cover_image);
                $val_data['cover_image'] = $image_path;
            
        }
        //update
        $project->update($val_data);
        //redirect
        return to_route('admin.project.index')->with ('message', 'Post created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
