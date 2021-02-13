@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16 h-screen">
    <div class="grid justify-items-center">
        <div class="text-4xl mb-3">[<span class="fond-bold"> {{ $user-> id}} </span>の詳細情報 ]</div>
    </div>

    <div class="card">
        <div class="roe no-gutters">
            <div class="card-body">
                <div>
                    <div class="text-3xl">名前 : <span class="fond-bold">{{$user->name}}</span></div>
                    <div class="text-3xl">メールアドレス : <span class="fond-bold">{{$user->email}}</span></div>
                    <div class="text-3xl">本命 : <span class="fond-bold">{{$user->real_name}}</span></div>
                    <div class="text-3xl">電話番号 : <span class="fond-bold">{{$user->tel}}</span></div>
                    <div class="text-3xl">住所 : <span class="fond-bold">{{$user->addres}}</span></div>
                    <div class="text-3xl">郵便番号 : <span class="fond-bold">{{$user->postal}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <form action="/member/{{ $user -> id }}" method="POST">
            @method('delete')
            @csrf
            <div class="grid justify-items-center mt-3">
                <div class="text-2xl">※ユーザーを削除したいなら、下の＜会員削除＞ボタンを押してください。</div>
                <button class="bg-gray-700 hover:bg-gray-900 text-white text-2xl font-bold py-2 px-4 border border-gray-900 rounded mb-3 mt-3">会員削除</button>
            </div>
    </form>
</div>

@endsection