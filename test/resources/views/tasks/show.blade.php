@extends('layout')

@section('content')
<div class="px-64 mt-5">
    <div class="float-right">
        <a href="/tasks/{{ $task -> id }}/edit">
            <button class="bg-yellow-400 px-4 text-white hover:bg-yellow-600">edit</button>
        </a>
        <form action="/tasks/{{ $task -> id }}" method="POST">
            @method('delete')
            @csrf
            <button class="flex-initial bg-red-500 px-2 hover:bg-red-300">Delete</button>
        </form>
    </div>
    <h1 class="text-3xl font-bold">Task</h1>
    <div>Title : {{ $task -> title}} <small class="float-right">created_at {{ $task -> created_at }}</small></div>
    body : {{ $task -> body}}
</div>
@endsection