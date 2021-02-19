<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;

class ReviewController extends Controller
{

    public function index($user_id)
    {
        $reviews = Review::where("user_id", $user_id)->get();

        return view('review.index', [
            'reviews' => $reviews,
            'user_id' => $user_id
        ]);

    }


    public function create($user_id)
    {       
        return view('review.create', [
            'user_id' => $user_id
        ]);
    }

    public function store($user_id)
    {
        request()->validate([
            'title' => 'required',
            'story' => 'required'
        ]);
        // $user = User::where('id', $user_id)->get();
        // $product = Product::find($user_id);

        $values=request(['title', 'story']);
        $values['user_id'] = $user_id;

        $review = Review::create($values);

        return redirect('review/'.$user_id);
    }
}
