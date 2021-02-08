<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function() {
    return Redirect::to("/tables");
})->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::resource("tables", TableController::class);
    Route::resource("projects", ProjectController::class);
    Route::resource("/redirect", RotatorController::class);
});

// Route::get('/url/{id}',function($id){  
//     $url=Project::find($id);  
//     foreach($url->id as $role)  
//     {  
//        return $role->name;  
//     }  
//     });  

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource("projects", ProjectController::class);
//     Route::resource("/redirect", RotatorController::class);
// });