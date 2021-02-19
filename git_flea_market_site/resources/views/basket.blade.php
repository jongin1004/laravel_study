@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="border-b-4 border-gray-600">
                <h2 class="text-3xl text-gray-800 font-mono">購入カート</h2>
            </div>

            <div class="p-6 mt-3 text-lg">
                    {{ $user->name }}様の購入カート
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-t border-gray-600 text-gray-700 p-2">
                <div class="ml-8">
                    選択
                </div>
                <div class="ml-10 col-start-2 col-end-4">
                    写真
                </div>
                <div class="col-start-5 col-end-8">
                    商品情報
                </div>
                <div class="col-start-9 col-end-10">
                    価格
                </div>
                <div class="col-start-11 col-end-12">
                    カテゴリー
                </div>
            </div>
            <!-- 商品のカート -->
            @foreach ($productCarts as $productCart)                            
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                    <div class="p-4 place-self-center">
                        <form method="POST" name="form">
                            @method('delete')
                            @csrf
                            <input type="checkbox" name="product_id[]" value="{{ $productCart->product->id }}">                                             
                    </div>
                    <div class="p-4 col-start-2 col-end-4">
                    <a href="/products/{{ $productCart->product->id }}">
                        <img src="{{ $productCart->product->photo->thumbnail_url }}" height="100" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    </div>
                    <div class="col-start-5 col-end-8 inline-block align-middle ">
                        <div class="text-lg mt-2 hover:text-gray:300"><strong>{{ $productCart->product->pro_title }}</strong></div>
                        <div class="flex items-center text-sm mt-1">
                            <span class="ml-1">{{ $productCart->product->pro_state}}</span>
                            <span class="mx-2">|</span>
                            <span><small>{{ $productCart->product->created_at }}</small></span>
                        </div>
                    </div>
                    <div class="text-sm col-start-9 col-end-10 mt-6">
                        {{ $productCart->product->pro_price }}
                    </div>
                    <div class="text-sm col-start-11 mt-6">
                        {{ $productCart->product->pro_tag }}
                    </div>
                </div>
                <div class="invisible">{{ $total_price += $productCart->product-> pro_price }}</div>
            @endforeach
                        <!-- <input class="ml-6 mb-10 bg-gray-700 hover:bg-gray-900 text-white font-bold py-1 px-2 border border-gray-900 rounded" type="submit" value="削除"> -->
                        <input class="mb-10 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" type="submit" value="削除" onclick="javascript: form.action='/basket/delete';"/>                            
                             
                          
                        
            

            <!-- 商品の総価格 -->
            <div class="mt-10 mr-12">
                <h2 class="text-right text-xl">商品の数：<span class="font-bold">{{ count($productCarts) }}</span></h2>
                <h2 class="text-right text-xl">商品の総価格：<span class="font-bold">{{ $total_price }}</span></h2>
            </div>

            <!-- 購入 button -->
            <div class="grid justify-items-center mt-10">
                <!-- <input type="submit" value="購入" class="mb-10 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded"> -->
                <input class="mb-10 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" type="submit" value="購入" onclick="javascript: form.action='/basket/buy';"/>
            </div>
            </form> 
        </div>
    </div>
@endsection
