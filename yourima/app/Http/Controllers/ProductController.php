<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $photos = Photo::latest()->get();

        return view('products.index', [
            'products' => $products,
            'photos' => $photos        
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $values = request(['pro_tag', 'pro_state', 'pro_price','pro_title', 'pro_explan']);
        $values['user_seq'] = auth() -> id();
        $products = Product::create($values);

        if($request->has(['photo']))
        {
            $path = $request->file('photo')->store('public');
            $photo = Photo::create([
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName(),
            'user_seq' => auth()->id(),
            'pro_seq' => $products->id          
        ]);
        }

        return redirect('products/'.$products -> id);
        
    }

    public function show(Product $product)
    {
        $user = User::find($product->user_seq);
        $photos = Photo::all();

        return view('products/show' , [
            'product' => $product,
            'user' => $user,
            'photos' => $photos
        ]);
    }
}
