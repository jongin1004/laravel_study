@extends('layouts.main')

@section('content')
<div class="h-screen px-64 mt-5">
    <div class="border-b-4 border-gray-800 mt-12">
        <h1 class="text-3xl font-bold">レビュー 登録</h1>
    </div>
    
    <div class="p-5">        
        <form action="/review/{{ $user_id }}" method="POST">
            @csrf            
            <div class="mb-4 mt-4">            
            <label class="text-xl" for="title">レビューのタイトル</label><br>
            <input class="w-full mt-1 px-3 py-1 border-2 border-gray-500 hover:border-gray-700 @error('title') border-4 border-red-500 @enderror" type="text" name="title" id="title" value="{{ old('title') }}"><br>
            @error('title')
                <small class="text-red-500">{{ $message }}</small><br>
            @enderror
            </div>

            <label class="text-xl" for="story">レビューの内容</label><br>
            <textarea class="w-full mt-1 px-3 py-2 border-2 border-gray-500 hover:border-gray-700 @error('story') border-4 border-red-500 @enderror" name="story" id="story" cols="30" rows="10">{{ old('story') }}</textarea>
            @error('story')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <div class="grid justify-items-center">
                <button class="mt-5 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection