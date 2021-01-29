@extends('layout')

@section('title', 'Task detail')


@section('content')
<div class="px-64 mt-4">
  <div class="flex">
    <h1 class="font-bold text-3xl flex-1">detail Task</h1>
    <a href="/tasks/{{ $task -> id }}/edit">
    <button class="flex-initial bg-green-500 px-4 py-2 hover:bg-green-300">Edit</button>
    </a>
  </div>
  title : {{ $task -> title }} <small class="float-right">created_at {{ $task -> created_at }}</small><br>
  <small class="float-right">updated_at {{ $task -> updated_at }}</small><br>
  body
  <div class="border p-3 my-3">{{ $task -> body }}</div>
</div>
@endsection