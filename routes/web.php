<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\WebControllers\CustomAuthController;
use App\Http\WebControllers\ProjectController;
use App\Http\WebControllers\TaskController;
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
    return view('login');
});

Route::get('/home', function () {
    return view('login');
});

//login
Route::post('login-user', [CustomAuthController::class, 'loginUser']);
Route::get('logout', [CustomAuthController::class, 'logout']);
Auth::routes();


//tasks
Route::get('tasks', [TaskController::class, 'index'])->middleware('isLoggedIn');
Route::post('tasks', [TaskController::class, 'store'])->middleware('isAdmin');
Route::post('update-task/{id}', [TaskController::class, 'update'])->middleware('isAdmin');
Route::get('tasks/{id}', [TaskController::class, 'show'])->middleware('isLoggedIn');
Route::post('patchTask/{id}', [TaskController::class, 'patch'])->middleware('isLoggedIn');
Route::delete('deleteTask/{id}', [TaskController::class, 'destroy'])->name('delete-task')->middleware('isAdmin'); 

// //projects
Route::get('projects',  [ProjectController::class, 'index'])->middleware('isAdmin');
Route::get('projects/{id}', [ProjectController::class, 'show'])->middleware('isAdmin');
Route::post('projects', [ProjectController::class, 'store'])->middleware('isAdmin');
Route::post('update-project/{id}', [ProjectController::class, 'update'])->middleware('isAdmin');
Route::delete('deleteProject/{id}', [ProjectController::class, 'destroy'])->name('delete-project')->middleware('isAdmin'); 