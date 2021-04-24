<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Request_friend;

class MypageController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->id())->first();

        return view('mypage.index', [
            'user' => $user
        ]);
    }


    public function request()
    {
        $request_list = Request_friend::where('to', auth()->id())->get();    
        
        return view('mypage.request_friend', [
            'request_list' => $request_list
        ]);
    }
}
