<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Letter;
use App\Models\Blind_user;
use Illuminate\Http\Request;
use App\Models\Request_friend;
use App\Models\List_of_bookmark;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function myforum()
    {
        $forums = Forum::where('user_id', auth()->id())->orderBy('id', 'DESC')-> paginate(5);

        return view('mypage.myforum', [
            'forums' => $forums
        ]);
    }

    public function box_of_letter()
    {
        $letters = Letter::where('to', auth()->id())->orwhere('from', auth()->id())->orderBy('id', 'DESC')->paginate(5);

        return view('mypage.box_of_letter', [
            'letters' => $letters
        ]);
    }
    
    public function letter_filter($num)
    {
        if($num == 1){
            $letters = Letter::where('to', auth()->id())->orwhere('from', auth()->id())->orderBy('id', 'DESC')->paginate(5);
        } else if($num == 2){
            $letters = Letter::where('to', auth()->id())->orderBy('id','DESC')->paginate(5);
        } else {
            $letters = Letter::where('from', auth()->id())->orderBy('id','DESC')->paginate(5);
        }

        return view('mypage.box_of_letter', [
            'letters' => $letters
        ]);    
    }

    public function blind_list()
    {
        $blind_list = Blind_user::where('user_id', auth()->id())->paginate(3);

        return view('mypage.blind_list', [
            'blind_list' => $blind_list
        ]);
    }

    public function bookmark_list()
    {
        $bookmark_list = List_of_bookmark::where('user_id', auth()->id())->paginate(5);
        
        return view('mypage.bookmark_list', [
            'bookmark_list' => $bookmark_list
        ]);
    }

    public function user_info($id)
    {
        $user = User::where('id', $id)->first();

        return view('mypage.user_information',[
            'user' => $user
        ]);
    }
}
