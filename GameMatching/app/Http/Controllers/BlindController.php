<?php

namespace App\Http\Controllers;

use App\Models\Blind_user;
use Illuminate\Http\Request;

class BlindController extends Controller
{
    public function add_blind($id)
    {
        $blind_user = Blind_user::where('user_id', auth()->id())->where('target_id', $id)->first();

        if($blind_user==null){
            $values['user_id'] = auth()->id();
            $values['target_id'] = $id;

            Blind_user::create($values);

            emotify('success', '블라인드!');
        } else {
            emotify('error', '이미 블라인드 상태입니다!');
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        // abort_unless(auth()->user()->blindowns($blind), 403);

        $blind_user = Blind_user::where('user_id', auth()->id())->where('target_id', $id)->first();

        $blind_user -> delete();

        return redirect()->back();
    }
}
