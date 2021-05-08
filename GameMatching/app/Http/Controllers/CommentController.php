<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Additional_comment;

class CommentController extends Controller
{
    public function create_comment(Request $request)
    {
        request()->validate([
            'body' => 'required',
            'forum_id' => 'required'
        ]);

        $values = request(['body', 'forum_id']);
        $values['user_id'] = auth()->id();
        
        Comment::create($values);

        return redirect()->back();
    }

    public function create_additional_comment(Request $request)
    {
        request()->validate([
            'body' => 'required',
            'comment_id' => 'required'
        ]);

        $values = request(['body', 'comment_id']);
        $values['user_id'] = auth()->id();

        Additional_comment::create($values);

        return redirect()->back();
    }
}
