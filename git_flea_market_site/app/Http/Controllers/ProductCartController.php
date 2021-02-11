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

        $product_info_in_carts = ProductCart::where('product_carts.user_seq', auth()->id())
            ->Join('products', 'product_carts.pro_seq', '=', 'products.id')
            ->latest('product_carts.created_at')
            ->get();

        $photo_url_in_carts = ProductCart::where('product_carts.user_seq', auth()->id())
            ->Join('photos', 'product_carts.pro_seq', '=', 'photos.pro_seq')
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
        //     'pro_seq' => 'required'
        // ]);        
        
        $carts = productCart::where('user_seq', auth()->id())->get();    
        $values = request(['pro_seq']);   
        $values['user_seq'] = auth() -> id();


        if(!isset($carts[0]))
        {
            emotify('success', 'カートに入れました！@^ㅡ^@');

            $itembaket = productCart::create($values);            
        }            
        

        for($i=0; $i<count($carts); $i++)
        {
            if($carts[$i] -> pro_seq == $request -> pro_seq)
            {
                emotify('error', 'すでにカートに入っています。');

                break;                
            }
            
            if($carts[$i] -> pro_seq != $request -> pro_seq && $i == count($carts)-1 )
            {
                emotify('success', 'カートに入れました！@^ㅡ^@');

                $itembaket = productCart::create($values);
            }

        }
                

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        for($i=0; $i<count($request->pro_seq); $i++)
        {
            $product = productCart::where('pro_seq', $request->pro_seq[$i])->delete();
        }
        
        return redirect()->back();        
    }
}
