<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SellerRegistrationController extends Controller
{
    public function index()
    {
        return view('agree');
    }

    public function update(Request $request)
    {
        $this->validate(
            $request, 
            [   
                'agree1' => 'required',
                'agree2' => 'required'
            ],
            [   
                'agree1.required' => '동의 안해주면 안해줌!! ㅋㅋ',
                'agree2.required' => '동의 안해주면 안해줌!! ㅋㅋ'
            ]
        );

        
        $user = User::find(auth()->id());

        if($user['level'] != "seller")
        {
            $user['level'] = "seller";
            $user -> update();
            emotify('success', '판매자등록 성공.');

        } else {
            emotify('error', '이미 판매자입니다.');
        }

        return redirect()->back();
    }
}
