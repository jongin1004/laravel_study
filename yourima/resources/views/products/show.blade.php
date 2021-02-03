@extends('layouts.main')

@section('content')
<div class="h-screen px-64 mt-4">
    <div class="flex">
        <a href="/products" class="flex-1">
            <h1 class="font-bold text-3xl">detail Item</h1>
        </a>
        @if (auth()->id() == $product -> user_id)
            <a href="/tasks/{{ $product -> id }}/edit">
                <button class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/tasks/{{ $product -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    タイトル : {{ $product -> pro_title }} <small class="float-right">created_at {{ $product -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $product -> updated_at }}</small><br>
    <small class="float-right">著者 {{ $user->name }}</small><br>
    写真
    @foreach($photos as $photo)
        @if($photo -> pro_seq == $product -> id)
            <div class="border p-3 my-3"><img src="{{ $photo -> url }}" width="200" height="200"></div>
        @endif
    @endforeach
    状態
    <div class="border p-3 my-3">{{ $product -> pro_state }}</div>
    価格
    <div class="border p-3 my-3">{{ $product -> pro_price }}</div>
    内容
    <div class="border p-3 my-3">{{ $product -> pro_explan }}</div>
</div>
@endsection