@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="grid grid-cols-12">
                <h2 class="uppercase tracking-wider text-orange-700 text-lg font-semibold">ALL</h2>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">BOOK</h2>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">IT</h2>
            </div>
            
            <div class="flex flex-col md:flex-row items-center">
                <div class="relative mt-3 md:mt-6">
                    <input type="text" class="bg-gray-400 rounded-full w-64 pl-8 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">                                
                        <i class="fas fa-search mt-2 ml-3"></i>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <!-- <img src="/img/avatar.png" alt="avatar" class="rounded-full w-8 h-8">  -->
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-3 mb-20">               
                @foreach($products as $product)
                    <div class="mt-8">
                        @foreach($photos as $photo)
                            @if($product -> id == $photo -> pro_seq)
                                <a href="/products/{{ $product -> id }}">                            
                                    <img src="{{ $photo -> url }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            @endif
                        @endforeach
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $product -> pro_title }}</a>
                            <div class="flex items-center text-sm mt-1">
                                <span><i class="fas fa-star text-yellow-400"></i></span>
                                <span class="ml-1">{{ $product -> pro_price }}</span>
                                <span class="mx-2">|</span>
                                <span><small>{{ $product -> created_at }}</small></span>
                            </div>
                            <div class="text-sm">
                                {{ $product -> pro_explan }}
                            </div>
                        </div>
                    </div>
                @endforeach                
            </div>
        </div>
    </div>
@endsection
