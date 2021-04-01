<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


//로그인 한사람들은 chats라는 채널을 들을 수 있도록 컨디션을 동일하게 설정한 것이다.
Broadcast::channel('chats', function ($user) {
    //유저가 로그인 했는지 안했는지
    return auth()->check();
});
