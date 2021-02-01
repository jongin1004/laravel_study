@extends('layout')

@section('content')
<div class="px-64 mt-5">
    <div class="flex">
        <div class="flex-none">
            <h1 class="text-3xl font-bold">商品リスト</h1>
        </div>
        <div class="flex-grow"></div>
        <div class="flex-none">
            <a href="/tasks/create">
                <button class= "bg-blue-400 px-4 py-2 text-white hover:bg-blue-600">create</button>
            </a>
        </div>
    </div>
    <section class="mt-5">       
        <h2 class="mb-2 font-extralight text-pink-500">人気商品リスト</h2>
        <div class="flex flex-wrap ">
            @foreach($Tasks as $Task)          
                <div class="bg-blue-200 mb-2 mr-2 w-24 h-40">
                    <a href="/tasks/{{ $Task -> id }}">
                        <div><img src="C:\web_test\login\resources\views\media\osaka.jpg"></div>
                        <div>{{ $Task-> title }} </div>
                        <div>가격</div>
                    </a>
                </div>
            @endforeach            
        </div>                        
    </section>
    
</div>
@endsection