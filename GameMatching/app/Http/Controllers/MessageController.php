<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where(function($query) {
            //내가 상대방에게 보내는 메세지
            $query->where('from', request('from'));
            $query->where('to', request('to'));
        })->orWhere(function($query){
            //상대방이 나에게 보내는 메세지
            $query->where('from', request('to'));
            $query->where('to', request('from'));
        })->get();

        return response()->json([
            //load를 통해서 from/to의 이름을 가져올 수 있다. 
            'messages' => $messages->load('from' ,'to')
        ], 200);
    }

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
            'message' => $message->load('from', 'to')
        ], 201);
    }
}
