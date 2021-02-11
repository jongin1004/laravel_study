<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /** 
     * メール転送コード 
     * 
     * @return string 
     */ 
    public function send(Request $request) { 
        $user = array( 
            'email' => 'cojwd300@gmail.com', 
            'name' => 'yourima' 
        ); 

        $data = array( 
            'detail'=> '商品の購入をしました。価格、名前などを送りましょう！', 
            'name' => $user['name'], 
        ); 

        Mail::send('emails.gmail', $data, function($message) use ($user) { 
            $message->from('yourima@gamil.com', 'yourima'); 
            $message->to($user['email'], 
            $user['name'])->subject('[yourima] 商品の購入のご案内'); 
        }); 

        return view('home'); }

}
