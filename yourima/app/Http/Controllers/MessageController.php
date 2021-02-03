<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store()
    {
        return response()->json([
            'hello' => 'world'
        ], 201);
    }
}
