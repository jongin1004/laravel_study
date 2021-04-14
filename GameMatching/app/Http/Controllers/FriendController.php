<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_of_friend;
use App\Models\Request_friend;

class FriendController extends Controller
{
    public function request($id)
    {
        $check_request = Request_friend::where('from', auth()->id())->where('to', $id)->first();
        $check_friend = List_of_friend::where('user_id', auth()->id())->where('friend_id', $id)->first();

        if($check_friend == null && $check_request == null && auth()->id() != $id){
            $data['from'] = auth()->id();
            $data['to'] = $id;

            Request_friend::create($data);
            emotify('success', '친추성공!');
        } else {
            emotify('error', '이미 친구야 or 자기 자신은 친추 못해요!');
        }
        return redirect()->back();
    }


    public function friend($id)
    {
        $user = List_of_friend::where('user_id', auth()->id())->where('friend_id', $id)->first();

        if($user == null && auth()->id() != $id){
            $values['friend_id'] = $id;
            $values['user_id'] = auth()->id();
            $values['forum_id'] = 1;

            List_of_friend::create($values);
            emotify('success', '친추성공!');
        } else {
            emotify('error', '이미 친구야 or 자기 자신은 친추 못해요!');
        }

        return redirect()->back();
    }

    public function accept(Request $request)
    {
        dd($request);

        return redirect()->back();
    }

    public function refusal(Request $request)
    {
        Request_friend::where('from', $request->request_id)->delete();

        return redirect()->back();
    }
}
