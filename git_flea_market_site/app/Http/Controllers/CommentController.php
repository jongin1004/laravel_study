<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
{
    public function store()
    {           
        $values = request(['body', 'qna_id']);
        $values['user_id'] = auth()->id();  //현제 로그인 사람의 id값도 같이 저장한다. 
        

        $comments = comment::create($values);

        return redirect('/qna');        
    }
}
