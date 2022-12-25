<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'Auth\LoginController@login');
Route::resource('tasks', 'TaskController');
Route::get('logout', 'Auth\LoginController@logout');

    Route::post('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('isAdmin');
    Route::get('projects/projectDetails/{id}', 'ProjectController@show')->middleware('isLoggedIn');
    Route::resource('projects', 'ProjectController');
    // Route::resource('tasks', 'TaskController')->middleware('isLoggedIn');
    Route::post('project', 'ProjectController@store');
    Route::post('tasks', 'TaskController@store');
    Route::post('patchTask/{id}', 'TaskController@patch');
    Route::post('deleteProject/{id}', 'ProjectController@destroy');
    Route::resource('tasks', 'TaskController')->middleware('isLoggedIn');

   