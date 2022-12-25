<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//login
Route::post('/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

//tasks
Route::resource('tasks', 'TaskController')->middleware('isLoggedIn');
Route::post('tasks', 'TaskController@store')->middleware('isAdmin');
Route::post('patchTask/{id}', 'TaskController@patch')->middleware('isLoggedIn');

//projects
Route::resource('projects', 'ProjectController')->middleware('isAdmin');
Route::get('projects/projectDetails/{id}', 'ProjectController@show')->middleware('isAdmin');
Route::post('project', 'ProjectController@store')->middleware('isAdmin');
Route::post('deleteProject/{id}', 'ProjectController@destroy')->middleware('isAdmin'); 