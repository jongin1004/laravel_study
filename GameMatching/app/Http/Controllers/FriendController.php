<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_of_friend;

class FriendController extends Controller
{
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
}
