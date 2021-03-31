<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //메세지를 DB에 저장하는 역할 
    public function store()
    {
        //request() post값들을 받아옴
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);

        $message = Message::create($validated);
        

        //json형식으로 리턴을한다.
        return response()->json([
            'message' => $message
        ], 201);
    }
}
