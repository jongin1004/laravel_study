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
    public function index()
    {
        $user = User::find(auth()->id());

        $product_info_in_carts = ProductCart::where('product_carts.user_id', auth()->id())
            ->Join('products', 'product_carts.product_id', '=', 'products.id')
            ->latest('product_carts.created_at')
            ->get();

        $photo_url_in_carts = ProductCart::where('product_carts.user_id', auth()->id())
            ->Join('photos', 'product_carts.product_id', '=', 'photos.product_id')
            ->latest('product_carts.created_at')
            ->select('photos.url')
            ->get();

        return view('basket', [
            'product_info_in_carts' => $product_info_in_carts,
            'photo_url_in_carts' => $photo_url_in_carts,
            "user" => $user,
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
        // for($i=0; $i<count($request->product_id); $i++)
        // {
        //     $product = productCart::where('product_id', $request->product_id[$i])->delete();
        // }
        
        dd($request);
        // return redirect()->back();        
    }
}
