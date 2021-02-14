@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 h-screen">
        <div class="popular-movies">
            <div class="grid grid-cols-12">                
                @foreach ($Categories as $category)
                    <a href="/products/category/{{ $category -> category }}">
                        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $category->category }}</h2>    
                    </a>
                @endforeach                            
                <a href="/products/create">
                    <button class= "bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900">製品登録</button>
                </a>
            </div>
            
            <div class="flex flex-col md:flex-row items-center">
                <div class="relative mt-3 md:mt-6">
                    <form action="/products/search" method="POST">
                        @csrf
                        <input type="text" class="bg-gray-400 rounded-full w-64 pl-8 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search" name="search">
                        <div class="absolute top-0">                                
                            <i class="fas fa-search mt-2 ml-3"></i>
                        </div>
                </div>
                        <div class="md:ml-4 mt-3 md:mt-0">
                            <button>
                                <img src="/img/logo.png" alt="avatar" class="rounded-full w-8 h-8">
                            </button>                    
                        </div>
                    </form>
            </div>            

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-3 mb-20">               
                @foreach($products as $product)
                    <div class="mt-8">
                        <a href="/products/{{ $product -> id }}">                            
                            <img src="{{ $product ->photo->url }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <p class="text-lg mt-2 text-gray:800 hover:text-gray:300">{{ $product -> pro_title }}</p>
                            <div class="flex items-center text-sm mt-1">
                                <span><i class="fas fa-star text-yellow-400"></i></span>
                                <span class="ml-1">{{ $product -> pro_price }}</span>
                                <span class="mx-2">|</span>
                                <span><small>{{ $product -> created_at }}</small></span>
                            </div>
                            <div class="text-sm truncate md:overflow-clip">
                                {{ $product -> pro_explan }}
                            </div>
                        </div>
                    </div>
                @endforeach                
            </div>
            {!! $products->render() !!}
        </div>
    </div>
@endsection
