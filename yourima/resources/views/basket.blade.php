@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="border-b-4 border-gray-600">
                <h2 class="text-3xl text-gray-800 font-mono">購入カート</h2>
            </div>

            <div class="p-6 mt-3 text-lg">
                    (user)様の購入カート
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-t border-gray-600 text-gray-700 p-2">
                <div class="ml-8">
                    選択
                </div>
                <div class="ml-10 col-start-2 col-end-4">
                    写真
                </div>
                <div class="col-start-5 col-end-8">
                    商品情報
                </div>
                <div class="col-start-9 col-end-10">
                    価格
                </div>
                <div class="col-start-11 col-end-12">
                    ??日
                </div>
            </div>
            <!-- 商品のカート -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                <div class="p-4 place-self-center">
                    <input type="checkbox">
                </div>
                <div class="p-4 col-start-2 col-end-4">
                   <a href="./next.php">
                       <img src="/img/ex/ex1.png" height="100" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="col-start-5 col-end-8 inline-block align-middle mt-12">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Seoul</a>
                    <div class="flex items-center text-sm mt-1">
                        <span class="ml-1">(上/中/下)</span>
                        <span class="mx-2">|</span>
                        <span>Jan 20, 1752</span>
                    </div>
                </div>
                <div class="text-sm col-start-9 col-end-10 mt-12">
                    1200円
                </div>
                <div class="text-sm col-start-11 col-end-12 mt-12">
                    2021/01/12
                </div>
            </div>
            <!-- 商品カート２ -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                <div class="p-4 place-self-center">
                    <input type="checkbox">
                </div>
                <div class="p-4 col-start-2 col-end-4">
                   <a href="./next.php">
                       <img src="/img/ex/ex7.png" height="100" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="col-start-5 col-end-8 inline-block align-middle mt-12">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">old book</a>
                    <div class="flex items-center text-sm mt-1">
                        <span class="ml-1">(上/中/下)</span>
                        <span class="mx-2">|</span>
                        <span>Jan 20, 1752</span>
                    </div>
                </div>
                <div class="text-sm col-start-9 col-end-10 mt-12">
                    1200円
                </div>
                <div class="text-sm col-start-11 col-end-12 mt-12">
                    2021/09/02
                </div>
            </div>

            <!-- 商品の総価格 -->
            <div class="mt-10 mr-12">
                <h2 class="text-right text-xl">商品の数：<span class="font-bold">2</span></h2>
                <h2 class="text-right text-xl">商品の総価格：<span class="font-bold">2400円</span></h2>
            </div>

            <!-- 購入 button -->
            <div class="grid justify-items-center mt-10">
                <input type="submit" value="購入" class="mb-10 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded">
            </div>
        </div>
    </div>
@endsection
