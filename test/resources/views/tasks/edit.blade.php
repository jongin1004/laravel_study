@extends('layout')

@section('title', 'Create Task')


@section('content')
<div class="px-64">
  <h1 class="font-bold text-3xl">Edit Task</h1>
  <form action="/tasks/{{ $task -> id }}" method="POST">
    @method('PUT')
    @csrf
    <label class="block" for="title">title</label>  <!-- for="title" => id="title"인 input의 레이블 -->
    <input class="border-2 border-gray-800 w-full" value="{{ $task -> title }}" type="text" name="title" id="title"><br>

    <label class="block" for="body">body</label>
    <textarea class="border-2 border-gray-800 w-full" name="body" id="body" cols="30" rows="10">{{ $task -> body }}</textarea><br>

    <button class="bg-blue-400 text-white px-2 py-2 float-right">Submit</button>
  </form>
</div>
@endsection