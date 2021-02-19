@extends('layouts.main')

@section('content')
    <form action="/review/create/{{ $user_id }}" method="POST">            
        @csrf
        @if (isset(auth()->user()->orders[0]))
            @if (auth()->user()->orders[0]->user_id == auth()->id())
                <div class="grid justify-items-center mt-3">              
                    <button class="bg-gray-700 hover:bg-gray-900 text-white text-2xl font-bold py-2 px-4 border border-gray-900 rounded mb-3 mt-3">Review</button>
                </div>
            @endif
        @endif   
    </form>
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-3 mb-20">               
        @foreach($reviews as $review)
            <li class="border-4 border-gray-500 px-2 py-2 mt-4">タイトル : {{ $review-> title }} <small class="float-right">created_at {{ $review -> created_at}}</small><br>
                内容 : {{ $review -> story }} </li>
        @endforeach                
    </div>
@endsection

