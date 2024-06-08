<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectControler extends Controller
{
    public function index(Request $request) {

        if($request->has('search')){
            
            
            return response()->json([

                'success'=>true,
                'results'=>Project::with(['category'])->orderByDesc('id')->where('title', 'LIKE', '%' . $request->search . '%')->paginate(),
                    

                //'search' => $request->search
            ]);
            dd($request->search);
        }


        return response()->json([
            'success'=>true,
            'results'=>Project::with(['category'])->orderByDesc('id')->paginate(),
        ]);
    }

    public function show ($id){

        //return $id;
    
    $project = Project::with(['category'])->where('id',$id)->first();
    
    //return $project;
    if ($project){
       return response()->json([
            'success'=>true,
            'results'=>$project,
       ]);
    } else {
        return response()->json([
            'success'=>false,
            'results'=>"404 Not Found"
        ]);
    }
    
    }
}
