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
use App\Jobs\CreateThumbnail;


class ProductController extends Controller
{
    public function __construct()
    {
        //현제 로그인이 되어있는 사람들만 사용가능하도록 지정했지만, except를 통해서 예외 메소드를 지정했다. 
        $this->middleware('auth')->except('index', 'search', 'filter');
    }

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
        //판매자가 아닌데, create 페이지에 접근할려고 할경우에 403에러가 발생하도록 했다. 
        abort_unless(auth()->user()->grade == 'seller', 403);

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
        
        CreateThumbnail::dispatch($photo);        

        return redirect('products/'.$products -> id);
        
        
    }

    public function show(Product $product)
    {
        $user = User::find($product->user_id);

        return view('products/show' , [
            'product' => $product,
            'user' => $user
        ]);
    }

    public function edit(Product $product)
    {
        abort_unless(auth()->user()->Productowns($product), 403);

        $categories = Categories::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        abort_unless(auth()->user()->Productowns($product), 403);
 
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
        //현재 선택된 글이 현제 로그인된 사람이 쓴 글인지 확인하고 아니면, 403에러
        abort_unless(auth()->user()->Productowns($product), 403);

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
