<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = [
            'laravel',
            'php'
        ];
        
        return view('framework_list', [
            'books' => $books
        ]);
    }
}
