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

        return response()->json([
            //load를 통해서 from과 to를 같이 가져올 수 있다. 
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

        MessageSent::dispatch($message);

        return response()->json([
            'message' =>$message->load('from')
        ], 201);
    }
}
