@extends('layout')

@section('content')
<div class="px-64 mt-4">
    <div class="flex">
        <a href="/tasks" class="flex-1">
            <h1 class="font-bold text-3xl">detail Task</h1>
        </a>
        @if (auth()->id() == $task -> user_id)
            <a href="/tasks/{{ $task -> id }}/edit">
                <button class="flex-initial bg-green-500 px-4 py-2 mx-2 hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/tasks/{{ $task -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-red-500 px-4 py-2 hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    title : {{ $task -> title }} <small class="float-right">created_at {{ $task -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $task -> updated_at }}</small><br>
    <small class="float-right">작성자 {{ $user->name }}</small><br>
    body
    <div class="border p-3 my-3">{{ $task -> body }}</div>    
</div>
@endsection