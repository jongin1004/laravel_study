<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_of_friend;

class MoveChatingController extends Controller
{
    public function index()
    {
        $friends = List_of_friend::where('user_id', auth()->id())->get();

        return view('home', [
            'friends' => $friends
        ]);
    }
}
