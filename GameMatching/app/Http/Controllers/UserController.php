<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\List_of_friend;

class UserController extends Controller
{
    public function index()
    {
        $validated = request()->validate([
            'currentUser' => 'required',
        ]); 

        // $users = User::all();
        $friends = List_of_friend::where('user_id', request('currentUser'))->get();

        return response()->json([
            // 'users' => $users
            'friends' => $friends->load('friend')
        ]);
    }
}
