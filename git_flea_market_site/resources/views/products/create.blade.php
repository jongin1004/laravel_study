@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-3">
    <div class="popular-movies">
        <div class="border-b-4 border-gray-600">
            <h2 class="text-3xl text-gray-800 font-mono">商品の登録</h2>
        </div>
        <div class="h-screen px-64 mt-12">
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="카테고리 mb-4">
                    <label for="pro_tag" class="text-xl">カテゴリ</label><br>
                    <input class="w-full px-3 py-1 border-2 border-gray-500 hover:border-gray-800 @error('pro_tag') border-4 border-blue-500 @enderror" type="text" name="pro_tag" id="pro_tag" list="categoriesList" value="{{ old('pro_tag') }}"><br>    
                    <datalist id="categoriesList">
                        @foreach($categories as $category)
                            @if ($category -> category != "all")
                                <option value="{{ $category -> category }}"></option>                          
                            @endif                            
                        @endforeach               
                    </datalist>  
                    @error('pro_tag')
                        <small class="text-red-500">{{ $message }}</small><br>
                    @enderror      
                </div>
                                
                <div class="상태 mb-4">
                    <label for="pro_state" clashs="text-xl">商品の品質</label><br>            
                    <input class="w-full px-3 py-1 border-2 border-gray-500 hover:border-gray-800 @error('pro_state') border-4 border-blue-500 @enderror" type="text" name="pro_state" id="pro_state" list="stateList" value="{{ old('pro_state') }}"><br>    
                    <datalist id="stateList">
                        <option value="新品未使用"></option>
                        <option value="未使用に近い"></option>
                        <option value="目立った傷や汚れなし"></option>                
                        <option value="目立った傷や汚れある"></option> 
                    </datalist>
                    @error('pro_state')
                        <small class="text-red-500">{{ $message }}</small><br>
                    @enderror
                </div>

                <div class="가격 mb-4">
                    <label for="price" class="text-xl">商品の価格</label><br>
                    <input class="w-full px-3 border-2 border-gray-500 hover:border-gray-800 @error('pro_price') border-4 border-blue-500 @enderror" type="text" name="pro_price" id="pro_price" value="{{ old('pro_price') }}"><br>
                    @error('pro_price')
                        <small class="text-red-500">{{ $message }}</small><br>
                    @enderror
                </div>

                                
                <div class="타이틀 mb-4">
                    <label for="pro_title" class="text-xl">投稿の名前</label><br>
                    <input class="w-full px-3 py-1 border-2 border-gray-500 hover:border-gray-800 @error('pro_title') border-4 border-blue-500 @enderror" type="text" name="pro_title" id="pro_title" value="{{ old('pro_title') }}"><br>
                    @error('pro_title')
                        <small class="text-red-500">{{ $message }}</small><br>
                    @enderror
                </div>
                
                <div class="설명 mb-2">
                    <label for="pro_explan" class="text-xl">商品の説明</label><br>
                    <textarea class="w-full px-3 py-3 border-2 border-gray-500 hover:border-gray-800 @error('pro_explan') border-4 border-blue-500 @enderror" name="pro_explan" id="pro_explan" cols="30" rows="10">{{ old('pro_explan') }}</textarea>
                    @error('pro_explan')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>                

                <!-- <div class="파일">
                    <input class="border-2 border-gray-500" type="file" name="photo">            
                </div> -->

                <div class="파일 w-full p-4">
                    <div class="relative border-dotted h-32 rounded-lg border-dashed border-2 border-gray-700 bg-gray-100 flex justify-center items-center">
                        <div class="absolute">
                            <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> </div>
                        </div> 
                        <input type="file" class="h-full w-full opacity-0" name="photo">
                    </div>
                </div>                

                <div class="grid justify-items-center mt-2 mb-12">
                <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded mb-3 ">登録</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection