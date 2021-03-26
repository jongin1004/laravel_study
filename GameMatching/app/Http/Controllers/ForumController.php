<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Http\Request;
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
        $forum = Forum::where('id', $request['forum_id'])->get();
            
        if($request['recommend'] == 'good'){
            $forum[0]->number_of_recommend += 1;    
        } else {
            $forum[0]->number_of_recommend -= 1;    
        }

        // $value['number_of_recommend'] = $forum[0]->number_of_recommend;

        // $forum -> update(request($value));

        $forum[0]->save();

        return redirect()->back();
    }
}
