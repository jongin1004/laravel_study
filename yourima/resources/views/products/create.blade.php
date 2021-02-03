@extends('layouts.main')

@section('content')
<div class="h-screen px-64 mt-5">
    <h1 class="text-3xl font-bold">Task Create</h1>
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="카테고리">
            <label for="pro_tag">categories</label><br>
            <input class="w-full border-2 border-blue-500" type="text" name="pro_tag" id="pro_tag" list="categoriesList"><br>    
            <datalist id="categoriesList">
                <option value="옷"></option>
                <option value="음식"></option>
                <option value="전자제품"></option>                
            </datalist>            
        </div>
        
        <div class="상태">
            <label for="pro_state">state</label><br>            
            <input class="w-full border-2 border-blue-500" type="text" name="pro_state" id="pro_state" list="stateList"><br>    
            <datalist id="stateList">
                <option value="새거"></option>
                <option value="중간"></option>
                <option value="낡음"></option>                
            </datalist>     
        </div>

        <div class="가격">
            <label for="price">price</label><br>
            <input class="w-full border-2 border-blue-500" type="text" name="pro_price" id="pro_price"><br>
        </div>

        
        
        <div class="타이틀">
            <label for="pro_title">Title</label><br>
            <input class="w-full border-2 border-blue-500 @error('pro_title') border-4 border-blue-500 @enderror" type="text" name="pro_title" id="pro_title" value="{{ old('pro_title') }}"><br>
            @error('pro_title')
                <small class="text-red-500">{{ $message }}</small><br>
            @enderror
        </div>
        
        <div class="설명">
            <label for="pro_explan">item explan</label><br>
            <textarea class="w-full border-2 border-blue-500 @error('pro_explan') border-4 border-blue-500 @enderror" name="pro_explan" id="pro_explan" cols="30" rows="10">{{ old('pro_explan') }}</textarea>
            @error('pro_explan')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>                

        <div class="파일">
            <input class="border-2 border-blue-500" type="file" name="photo">            
        </div>
        <button class="bg-blue-400 px-4 py-2 hover:bg-blue-600 float-right">Submit</button>
    </form>
</div>
@endsection