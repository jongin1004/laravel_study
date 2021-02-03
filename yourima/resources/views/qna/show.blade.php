@extends('layouts.main')

@section('content')
<div class="px-64 mt-4">
    <div class="flex">
        <a href="/qna" class="flex-1">
            <h1 class="font-bold text-3xl">detail QnA</h1>
        </a>
        @if (auth()->id() == $qna -> user_id)
            <a href="/qna/{{ $qna -> id }}/edit">
                <button class="flex-initial bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/qna/{{ $qna -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    タイトル : {{ $qna -> title }} <small class="float-right">created_at {{ $qna -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $qna -> updated_at }}</small><br>
    <small class="float-right">著者 {{ $user->name }}</small><br>    
    内容
    <div class="border p-3 my-3">{{ $qna -> body }}</div>    
</div>
@endsection