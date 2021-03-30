<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //메세지를 DB에 저장하는 역할 
    public function store()
    {
        //json형식으로 리턴을한다.
        return response()->json([
            'hello' => 'world'
        ], 201);
    }
}
