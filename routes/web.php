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

Route::get('/home', 'HomeController@index');
Route::post('/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();


    Route::post('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('isAdmin');
    Route::get('projects/projectDetails/{id}', 'ProjectController@show')->middleware('isLoggedIn');
    Route::resource('projects', 'ProjectController')->middleware('isLoggedIn');
    // Route::resource('tasks', 'TaskController')->middleware('isLoggedIn');
    Route::post('project', 'ProjectController@store');
    Route::post('tasks', 'TaskController@store')->middleware('isAdmin');
    Route::post('patchTask/{id}', 'TaskController@patch');
    Route::post('deleteProject/{id}', 'ProjectController@destroy');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('tasks', 'TaskController')->middleware('isLoggedIn');
	});