<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ChatUserController extends Controller
{
    public function index()
    {
        $users = User::find(request('to'));

        return response()->json([
            'users' => $users
        ], 200);
    }
}
