<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_of_friend;
use App\Models\Request_friend;

class FriendController extends Controller
{
    public function request($id)
    {
        //내가 요청 보낸 목록이 있는지 없는지
        $check_request_from = Request_friend::where('from', auth()->id())->where('to', $id)->first();
        //상대방에서 나한테 보낸 요청은 없는지
        $check_request_to = Request_friend::where('to', auth()->id())->where('from', $id)->first();
        //이미 친추되어있지는 않은지
        $check_friend = List_of_friend::where('user_id', auth()->id())->where('friend_id', $id)->first();

        if($check_friend == null && $check_request_from == null && $check_request_to == null && auth()->id() != $id){
            $data['from'] = auth()->id();
            $data['to'] = $id;

            Request_friend::create($data);
            emotify('success', '친추성공!');
        } else {
            emotify('error', '이미 친구야 or 자기 자신은 친추 못해요!');
        }
        return redirect()->back();
    }



    public function accept(Request $request)
    {
        request()->validate([
            'request_from' => 'required',
            'request_id' => 'required'
        ]);

        //접속유저의 친구목록에 요청온 상대방이 친추되어있는지 확인
        $check_friend_current = List_of_friend::where('user_id', auth()->id())->where('friend_id', $request->request_from)->first();
        //요청보낸 사람의 친구목록에 요청받은 사람이 있는지 확인 
        $check_friend_with = List_of_friend::where('user_id', $request->request_from)->where('friend_id', auth()->id())->first();

        if($check_friend_current == null && $check_friend_with == null){
            $values_current['friend_id'] = $request->request_from;
            $values_current['user_id'] = auth()->id();        

            $values_with['friend_id'] = auth()->id();
            $values_with['user_id'] = $request->request_from;            

            List_of_friend::create($values_current);
            List_of_friend::create($values_with);

            //친구등록이 완료되었으니, 친구요청에 있는 데이터는 삭제시킨다.
            $request_friend = Request_friend::where('id', $request->request_id)->delete();

            emotify('success', '친추성공!');
        } else {
            emotify('error', '이미 친구야 or 자기 자신은 친추 못해요!');
        }

        return redirect()->back();
    }

    public function refusal(Request $request)
    {
        Request_friend::where('from', $request->request_from)->delete();

        return redirect()->back();
    }
}
