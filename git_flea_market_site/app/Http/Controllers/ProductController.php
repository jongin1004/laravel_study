<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;



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
        $categories = Categories::all();

        return view('products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {        
        request()->validate([            
            'pro_state' => 'required', 
            'pro_price' => 'required',
            'pro_title' => 'required', 
            'pro_explan' => 'required',
            'pro_tag' => 'exists:categories,category'
        ]);

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
        $photos = Photo::where('pro_seq', $product->id)->latest()->first();

        return view('products/show' , [
            'product' => $product,
            'user' => $user,
            'photos' => $photos
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
 
        $values = request(['pro_tag', 'pro_state', 'pro_price','pro_title', 'pro_explan']);
        $values['user_seq'] = auth() -> id();
        $product -> update($values);

        if($request->has(['photo']))
        {
            $path = $request->file('photo')->store('public');
            $photo = Photo::create([
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName(),
            'user_seq' => auth()->id(),
            'pro_seq' => $product->id          
        ]);
        }

        return redirect('/products/'.$product->id);
    }

    public function destroy(Product $product)
    {
        // $photos = Photo::where('pro_seq', $product->id)->get();
        // $photos -> delete();
        $product -> delete();
        
        return redirect('/products');
        // return redirect()->back();
    }
}
