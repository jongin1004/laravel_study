<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;

class MessageController extends Controller
{   
    public function index()
    {
        $messages = Message::where(function($query) {
            $query->where('from', request('from'));
            $query->where('to', request('to'));
        })->orWhere(function($query) {
            $query->where('from', request('to'));
            $query->where('to', request('from'));
        })->get();
        
        //json형식으로 return을 한다. 
        return response()->json([
            //load를 통해서 from과 to의 이름을 가져올 수 있다.
            //Model Message를 보면 from, to가 user와 연결되어있기 때문에 User정보까지 같이 가져올 수 있다. 
            'messages' => $messages->load('from', 'to')
        ], 200);
    }


    public function store()
    {   
        // 아래 모든 값이 안왔을땐 에러값이 나오도록
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);        
        

        $message = Message::create($validated);
        
        //message를 생성했을 때, messageSent 이벤트를 실행시켜라
        MessageSent::dispatch($message);

        return response()->json([
            'message' =>$message->load('from')
        ], 201);
    }
}
