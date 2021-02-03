<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store()
    {   
        // 아래 모든 값이 안왔을땐 에러값이 나오도록
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);        
        

        $message = Message::create($validated);

        return response()->json([
            'message' =>$message
        ], 201);
    }
}
