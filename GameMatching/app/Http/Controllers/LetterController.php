<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function index($id)
    {
        $to = User::where('id', $id)->first();

        return view('letters.index', [
            'to' => $to
        ]);
    }

    public function create(Request $request)
    {
        

        request() -> validate([
            'to' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $values = request(['to', 'title', 'body']);
        $values['from'] = auth()->id();

        Letter::create($values);

        return '<script>self.close();</script>';
        

    }
}
