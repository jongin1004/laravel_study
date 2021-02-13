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
                'agree1.required' => '同意してください。',
                'agree2.required' => '同意してください。'
            ]
        );       
         
        $user = User::find(auth()->id());

        if($user['grade'] != "seller")
        {
            $user['grade'] = "seller";
            $user -> update();
            emotify('success', '販売者登録を成功しました。');

        } else {
            emotify('error', 'すでに販売者です。');
        }

        return redirect()->back();
    }
}
