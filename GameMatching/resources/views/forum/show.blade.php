@extends('layouts.app')

@section('content')
<div class="px-64 mt-4">
    <div class="flex">
        <a href="/forum" class="flex-1">
            <h1 class="font-bold text-3xl">detail forum</h1>
        </a>
        @if (auth()->id() == $forum -> user_id)
            <a href="/forum/{{ $forum -> id }}/edit">
                <button class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/forum/{{ $forum -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    タイトル : {{ $forum -> title }} <small class="float-right">created_at {{ $forum -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $forum -> updated_at }}</small><br>
    <small class="float-right">著者 {{ $forum->user->name }}</small><br>    
    内容
    <div class="border p-3 my-3">{{ $forum -> body }}</div>
    
    <div>
        <form action="/forum/recommend" method="POST">
            @csrf            
            <input type="hidden" id="forum_id" name="forum_id" value="{{ $forum->id }}">
            <input type="hidden" id="user_id" name="user_id" value="{{ $forum->user->id }}">
            <button class="flex-initial bg-blue-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="good">추천</button>
            <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="bad">비추천</button>            
        </form>
    </div>
</div>
@endsection