<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $books = [
            'laravel',
            'php'
        ];

        return view('welcome', [
            'books' => $books
        ]);
    }

    public function laravel() {
        return view('laravel');
    }

    public function ruby_on_rails() {
        return view('ruby_on_rails');
    }

    public function django() {
        return view('django');
    }
}
