<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/framework', [HomeController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::prefix('tasks')->middleware('auth')->group(function () {
//     Route::get('/', [TaskController::class, 'index'])->middleware(['auth']);

//     Route::get('/create', [TaskController::class, 'create']);

//     Route::post('/', [TaskController::class, 'store']);

//     Route::get('/{task}', [TaskController::class, 'show']);

//     Route::get('/{task}/edit', [TaskController::class, 'edit']);

//     Route::put('/{task}', [TaskController::class, 'update']);

//     Route::delete('/{task}', [App\Http\Controllers\TaskController::class, 'destroy']); 
            
// });

Route::resource('tasks', TaskController::class)->middleware('auth');
