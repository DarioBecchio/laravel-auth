<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


//Option 1 - basic json response format
/*Route::get('projects', function (){
    return Project::all();
});*/

//Option 2
Route::get('projects', function (){
    return response()->json([
        'results'=>Project::orderByDesc('id')->get()
    ]);
});


