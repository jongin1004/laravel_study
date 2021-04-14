<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Request_friend;

class MypageController extends Controller
{
    public function index()
    {
        $request_list = Request_friend::where('to', auth()->id())->get();    
        
        return view('mypage.index', [
            'request_list' => $request_list
        ]);
    }
}
