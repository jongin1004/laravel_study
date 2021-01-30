@extends('layout')

@section('content')
<div class="px-64 mt-5">
    <h1 class="text-3xl font-bold">Task Create</h1>
    <form action="/tasks" method="POST">
        @csrf
        <label for="title">Title</label><br>
        <input class="w-full @error('title') border-4 border-blue-500 @enderror" type="text" name="title" id="title" value="{{ old('title') }}"><br>
        @error('title')
            <small class="text-red-500">{{ $message }}</small><br>
        @enderror

        <label for="body">body</label><br>
        <textarea class="w-full @error('body') border-4 border-blue-500 @enderror" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
        @error('body')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        <button class="bg-blue-400 px-4 py-2 hover:bg-blue-600 float-right">Submit</button>
    </form>

</div>
@endsection