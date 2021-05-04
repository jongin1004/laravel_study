<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_of_bookmark;

class BookmarkController extends Controller
{
    public function bookmark(Request $request)
    {
        request()->validate([
            'forum_id' => 'required'
        ]);

        $bookmark_list = List_of_bookmark::where('user_id', auth()->id())->where('forum_id', $request['forum_id'])->first();

        if($bookmark_list == null){
            $values = request(['forum_id']);
            $values['user_id'] = auth() -> id();

            List_of_bookmark::create($values);
            emotify('success', '스크랩!');
        } else {
            emotify('error', '스크랩에 실패했습니다!');
        }

        return redirect()->back();
    }

    public function delete(List_of_bookmark $List_of_bookmark)
    {        
        $List_of_bookmark->delete();

        return redirect()->back();
    }
}
