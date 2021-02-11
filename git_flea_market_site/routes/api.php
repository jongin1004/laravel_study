<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatUserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//로그인한 유저만 api를 보낼 수 있게
// Route::prefix('messages')->group(function(){
//     Route::post('/', [MessageController::class], 'store');
// });


Route::resource('messages', MessageController::class);

Route::get('/users', [ChatUserController::class, 'index']);