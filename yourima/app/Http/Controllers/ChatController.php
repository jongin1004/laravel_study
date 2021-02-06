<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        return view('chats/index', [
            'request' => $request
        ]);
    }

    // public function test()
    // {
    //     // $users = DB::table('users')                
    //     //         ->groupBy('name')                
    //     //         ->get();
        
    //     $messages = DB::table('messages')
    //                 -> groupBy('from')                    
    //                 ->get();


    //     // $users = User::all()->groupby('name')
    //     // $users = DB::table('messages')           
    //     //    ->get();


    //     return view('test/index', [
    //         // 'users' => $users
    //         'messages' => $messages
    //     ]);
    // }
}
