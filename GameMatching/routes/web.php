<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//이메일에서 링크를 클릭했을 때
Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

Route::resource('forum', ForumController::class);

Route::POST('/forum/recommend', [ForumController::class, 'recommend']);

Route::get('/friend/{id}', [FriendController::class, 'friend']);

