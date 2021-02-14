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
        $products = Product::OrderBy('created_at', 'desc') -> paginate(8);
        $Categories = Categories::get();
        
        return view('products.index', [
            'products' => $products,            
            'Categories' => $Categories     
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
            'pro_price' => 'required|integer',
            'pro_title' => 'required', 
            'pro_explan' => 'required',
            'pro_tag' => 'exists:categories,category'
        ]);

        $values = request(['pro_tag', 'pro_state', 'pro_price','pro_title', 'pro_explan']);
        $values['user_id'] = auth() -> id();
        $products = Product::create($values);

        if($request->has(['photo']))
            {
                $path = $request->file('photo')->store('public');
                $photo = Photo::create([
                'url' => Storage::url($path),
                'hashname' => $request->file('photo')->hashName(),
                'originalname' => $request->file('photo')->getClientOriginalName(),
                'user_id' => auth()->id(),
                'product_id' => $products->id          
                ]);
            }

        return redirect('products/'.$products -> id);
        
        
    }

    public function show(Product $product)
    {
        $user = User::find($product->user_id);
        $photos = Photo::where('product_id', $product->id)->latest()->first();

        return view('products/show' , [
            'product' => $product,
            'user' => $user,
            'photos' => $photos
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Categories::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
 
        $values = request(['pro_tag', 'pro_state', 'pro_price','pro_title', 'pro_explan']);
        $values['user_id'] = auth() -> id();
        $product -> update($values);

        if($request->has(['photo']))
        {
            $path = $request->file('photo')->store('public');
            $photo = Photo::create([
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName(),
            'user_id' => auth()->id(),
            'product_id' => $product->id          
        ]);
        }

        return redirect('/products/'.$product->id);
    }

    public function destroy(Product $product)
    {        
        $product -> delete();
        
        return redirect('/products');        
    }

    public function filter($category)
    {
        if($category == "all")
        {
            $products = Product::OrderBy('created_at', 'desc') -> paginate(8); 
        }else{
            $products = Product::where('pro_tag', $category)->OrderBy('created_at', 'desc') -> paginate(8);            
        }

        $Categories = Categories::get();
        
        return view('products.index', [
            'products' => $products,            
            'Categories' => $Categories     
        ]);
    }

    public function search(Request $request)
    {        
        $products = Product::where('pro_title', 'like', '%' . $request->search . '%')->OrderBy('created_at', 'desc') -> paginate(8);
        $Categories = Categories::get();        
        
        return view('products.index', [
            'products' => $products,            
            'Categories' => $Categories            
        ]);
    }
}
