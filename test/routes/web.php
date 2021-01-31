<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
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


// Route::get('/', function () {
//     $books = [
//         'laravel',
//         'php'
//     ];

//     // return view('welcome')->withbooks($books);
//     // return view('welcome')->with([
//     //     'books' => $books
//     // ]);
//     return view('welcome', [
//         'books' => $books
//     ]);
// });

// Route::get('/', 'HomeController@index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/laravel', function () {
//     return view('laravel');
// });
Route::get('/laravel', [App\Http\Controllers\HomeController::class, 'laravel']);


// Route::get('/ruby_on_rails', function () {
//     return view('ruby_on_rails');
// });

Route::get('/ruby_on_rails', [App\Http\Controllers\HomeController::class, 'ruby_on_rails']);

// Route::get('/django', function () {
//     return view('django');
// });

Route::get('/django', [App\Http\Controllers\HomeController::class, 'django']);

Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index']);

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);

Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create']);
// Tasks를 하나 만들어달라
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store']); 

Route::get('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'show']); 

Route::get('/tasks/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit']); 

Route::put('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update']); 

Route::delete('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'destroy']); 


// Route::get('/token', function (Request $request) {
//   $token = $request->session()->token();

//   $token = csrf_token();

//   // ...
// });