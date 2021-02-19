<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productCart;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProductCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = User::find(auth()->id());
        $productCarts = productCart::where('user_id', auth()->id())->get();

        return view('basket', [
            'productCarts' => $productCarts,
            'user' => $user,
            'total_price' => 0
        ]);
    }


    public function store(Request $request)
    {
        // $validated = request()->validate([            
        //     'product_id' => 'required'
        // ]);        
        
        $carts = productCart::where('user_id', auth()->id())->get();    
        $values = request(['product_id']);   
        $values['user_id'] = auth() -> id();


        if(!isset($carts[0]))
        {
            emotify('success', 'カートに入れました！@^ㅡ^@');

            $itembaket = productCart::create($values);            
        }            
        

        for($i=0; $i<count($carts); $i++)
        {
            if($carts[$i] -> product_id == $request -> product_id)
            {
                emotify('error', 'すでにカートに入っています。');

                break;                
            }
            
            if($carts[$i] -> product_id != $request -> product_id && $i == count($carts)-1 )
            {
                emotify('success', 'カートに入れました！@^ㅡ^@');

                $itembaket = productCart::create($values);
            }

        }
                

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        for($i=0; $i<count($request->product_id); $i++)
        {
            $product = productCart::where('product_id', $request->product_id[$i])->delete();
        }
                
        return redirect()->back();        
    }
}
