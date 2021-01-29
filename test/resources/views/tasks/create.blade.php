@extends('layout')

@section('title', 'Create Task')


@section('content')
<div class="px-64">
  <h1 class="font-bold text-3xl">Task Create</h1>
  <form action="/tasks" method="POST">
    @csrf
    <label class="block" for="title">Title</label>  <!-- for="title" => id="title"인 input의 레이블 -->
    <input class="border-2 border-gray-800 w-full @error('title') border-blue-800 @enderror" type="text" name="title" id="title" required
    value="{{ old('title') ? old('title') : '' }}"><br>
    @error('title')
      <small class="text-red-700">{{ $message }}</small>
    @enderror

    <label class="block" for="body">Body</label>
    <textarea class="border-2 border-gray-800 w-full @error('title') border-blue-800 @enderror" name="body" id="body" cols="30" rows="10" required>{{ old('body') ? old('body') : '' }}</textarea><br>
    @error('body')
      <small class="text-red-700">{{ $message }}</small>
    @enderror

    <button class="bg-blue-400 text-white px-2 py-2 float-right">Submit</button>
  </form>
</div>
@endsection