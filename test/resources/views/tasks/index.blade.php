@extends('layout')

@section('title')
  Tasks
@endsection


@section('content')
<div class="px-64 mt-4">
  <div class="flex">
    <h1 class="font-bold text-3xl flex-1">Task list</h1>
    <a href="/tasks/create">
      <button class="bg-blue-400 px-4 py-2 text-white hover:bg-blue-600 flex-initial">Create</button>
    </a>
  </div>

  <ul>
    @foreach($Tasks as $Task)
    <a href="/tasks/{{ $Task -> id }}">
      <li class="border my-3 p-3">Title : {{ $Task -> title}} <small class="float-right">created_at {{$Task -> created_at }}</small></li>
    </a>
    @endforeach
  </ul>
</div>
@endsection