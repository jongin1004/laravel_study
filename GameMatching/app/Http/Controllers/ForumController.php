<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Check_to_recommend;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {   
        $forums = Forum::OrderBy('created_at', 'desc') -> paginate(5);        

        return view('forum.index', [
            'forums' => $forums            
        ]);
    }

    public function show(Forum $forum)
    {   
        return view('forum.show', [
            'forum' => $forum
        ]);
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store()
    {   
        request() -> validate([
            'title' => 'required',
            'body'  => 'required'                     
        ]);

        $values = request(['title', 'body']);
        $values['user_id'] = auth() -> id();
        $forum = Forum::create($values);
        return redirect('/forum');
    }

    public function edit(Qna $qna)
    {
        abort_unless(auth()->user()->Qnaowns($qna), 403);

        return view('qna.edit', [
            'qna' => $qna
        ]);
    }

    public function update(Qna $qna)
    {
        $qna -> update(request(['title', 'body']));

        return redirect('/qna/'.$qna->id);
    }

    public function destroy(Qna $qna)
    {
        abort_unless(auth()->user()->Qnaowns($qna), 403);
        
        $qna -> delete();

        return redirect('/qna');
    }

    public function recommend(Request $request)
    {
        $forum = Forum::where('id', $request['forum_id'])->first();
        $check_to_recommend = Check_to_recommend::where('user_id', $request['user_id'])->where('forum_id', $request['forum_id'])->first();

        if($check_to_recommend == null && $request['user_id'] != auth()->id()){
            if($request['recommend'] == 'good'){
                $forum->number_of_recommend += 1;

            } else {
                $forum->number_of_recommend -= 1;    
            }
        } else {
            emotify('error', '이미 추천한 글이라 못해@^ㅡ^@ or 자기자신 글');
            return redirect()->back();
        }
            
        
        request() -> validate([
            'user_id' => 'required',
            'forum_id'  => 'required'                     
        ]);

        $values = request(['user_id', 'forum_id']);        
        Check_to_recommend::create($values);

        $forum->save();

        emotify('success', '추천했어@^ㅡ^@');

        return redirect()->back();
    }

    // public function blind()
    // {


    //     abort_unless(auth()->user()->Qnaowns($forum), 403);
    // }
    
}
