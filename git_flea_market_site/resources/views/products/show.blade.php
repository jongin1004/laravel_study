@extends('layouts.main')

@section('content')
<div class="px-64 mt-4">
    <div class="flex">
        <a href="/products" class="flex-1">
            <h1 class="font-bold text-3xl">detail Item</h1>
        </a>
        @if (auth()->id() == $product -> user_id)
            <a href="/products/{{ $product -> id }}/edit">
                <button class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/products/{{ $product -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    
    <div class="text-3xl font-momo font-bold ml-8">{{ $product -> pro_title }}</div> 
    <small class="text-blue-500 ml-8">カテゴリー /{{ $product -> pro_tag }}</small><br>
    <small class="float-right">created_at {{ $product -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $product -> updated_at }}</small><br>    

    <div class="flex">
        <div class="flex-initial">
            <div class="p-3 my-3 w-max"><img src="{{ $photos -> url }}"></div>
        </div>
        <div class="flex-1 mt-3">
            <div class="flex flex-col">
                <a href="/review/{{ $user->id }}"><div class="border p-3 my-3">著者 : {{ $user->name }}</div></a>
                <div class="border p-3 my-3">状態 : {{ $product -> pro_state }}</div>
                <div class="border p-3 my-3">価格 : {{ $product -> pro_price }}</div>
                <div>
                    @if( $product -> user_id != auth()->id() )
                        <div class="flex">
                            <div class="flex-grow"></div>
                            <div class="flex-none ml-2">
                                <form action="/chats" method="POST">
                                    @csrf                
                                    <input type="hidden" name="user_id" value="{{ $user -> id }}">        
                                    <input class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300 " type="submit" value="1第1チャット">
                                </form>
                            </div>
                            <div class="flex-none ml-2">
                                <form action="/order" method="POST">
                                    @csrf                
                                    <input type="hidden" name="product_id" value="{{ $product -> id }}">       
                                    <input class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300" type="submit" value="購入">
                                </form>
                            </div>
                            <div class="flex-none ml-2">
                                <form action="/basket" method="POST">
                                    @csrf                                
                                    <input type="hidden" name="product_id" value="{{ $product -> id }}">                    
                                    <input class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300" type="submit" value="購入カート">                    
                                </form>            
                            </div>            
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    内容
    <div class="border p-3 my-3 " style="white-space:pre;">{{ $product -> pro_explan }}</div>
    
    
</div>
@endsection