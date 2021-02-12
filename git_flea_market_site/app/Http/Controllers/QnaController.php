<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qna;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class QnaController extends Controller
{
    public function index()
    {   
        $qnas = Qna::OrderBy('created_at', 'desc') -> paginate(5);
        $comments = Comment::get();

        return view('qna.index', [
            'qnas' => $qnas,
            'comments' => $comments
        ]);
    }

    public function show(Qna $qna)
    {   
        $user = User::find($qna->user_id);
        
        return view('qna.show', [
            'qna' => $qna,
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('qna.create');
    }

    public function store()
    {   
        request() -> validate([
            'title' => 'required',
            'body'  => 'required'            
        ]);

        $values = request(['title','body']);
        $values['user_id'] = auth() -> id();
        $qna = Qna::create($values);

        return redirect('/qna');
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
}
