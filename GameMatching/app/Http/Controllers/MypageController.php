<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request_friend;

class MypageController extends Controller
{
    public function index()
    {
        $request_list = Request_friend::where('to', auth()->id())->get();
        
        dd($request_list[0]->from);

        return view('mypage.index', [
            'request_list' => $request_list
        ]);
    }
}
