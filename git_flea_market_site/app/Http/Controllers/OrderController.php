<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\product;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());

        $order = Order::where('orders.user_id', auth()->id())
            ->Join('products', 'orders.products_id', '=', 'products.id')
            ->latest('orders.created_at')
            ->get();

        $photo_url_in_carts = Order::where('orders.user_id', auth()->id())
            ->Join('photos', 'orders.product_id', '=', 'photos.product_id')
            ->latest('orders.created_at')
            ->select('photos.url')
            ->get();

        return view('mypage.index', [
            'order' => $order,
            'photo_url_in_carts' => $photo_url_in_carts,
            "user" => $user,
            'total_price' => 0
        ]);
    }    
    
        
    public function store(Request $request)
    {
        request()->validate([
            'product_id'=>'required'
        ]);       
        
        // $carts = Order::where('user_id', auth()->id())->get();    
        $values = request(['product_id']);   
        $values['user_id'] = auth() -> id();

        $order = Order::create($values);




        return redirect()->back();

            
        }

        public function cartstore(Request $request)
    {
        for($i=0; $i<count($request->product_id); $i++)
        {
            $order = Order::create([
                'user_id' => auth()-> id(),
                'product_id'=> $request->product_id[$i]
            ]); 
            

        }
        // $values = request([
        //     'product_id'=>$request->product_id[0]
        // ]);    
        // $values['user_id'] = auth() -> id();
        // $order = Order::create($values);        
        // return redirect()->back();
        // dd(count($request->product_id));

        
        return redirect()->back();
               
    }
}