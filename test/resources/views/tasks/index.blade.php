@extends('layout')

@section('content')
<div class="px-64 mt-5">
    <div class="float-right">
        <a href="/tasks/create">
            <button class= "bg-blue-400 px-4 py-2 text-white hover:bg-blue-600">create</button>
        </a>
    </div>
    <h1 class="text-3xl font-bold">Task</h1>
    <ul>
    @foreach($Tasks as $Task)
        <a href="/tasks/{{ $Task -> id }}">
            <li class="border-4 px-2 py-2 mt-4">Title : {{ $Task-> title }} <small class="float-right">created_at {{ $Task -> created_at}}</small></li>
        </a>
    @endforeach
    </ul>
</div>
@endsection