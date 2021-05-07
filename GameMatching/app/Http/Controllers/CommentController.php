<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
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
}
