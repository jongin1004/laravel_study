<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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

//Api request를 보낼 때 사용하는 route다 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//middelware('auth:api') 로그인 한 유저만 api를 보낼 수 있도록
// prefix('messages') 고정 url 지정
//input text에서 메세지를 보내게되면  도메인/api/messages/ 주소로 이동 -> MessageController의 store함수사용
Route::prefix('messages')->group(function(){
    Route::get('/', [MessageController::class, 'index']);
    Route::post('/', [MessageController::class, 'store']);
});

// Route::resource('messages', MessageController::class);

Route::get('/users', [UserController::class, 'index']);
 