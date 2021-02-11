<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function show()
        {
            $characters = [
                'Test1' => 'Test2',
            ];

            return view('index')->withCharacters($characters);
        }
}
