@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="border-b-4 border-gray-600">
                <h2 class="text-3xl text-gray-800 font-mono">問い合わせ</h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2  mt-12 md:grid-cols-3 lg:grid-cols-12 border-b border-t border-gray-600 text-gray-700 p-2">
                <div class="ml-8">
                    番号
                </div>
                <div class="ml-10 col-start-2 col-end-6">
                    問い合わせ
                </div>
                <div class="col-start-7 col-end-8">
                    登録者
                </div>
                <div class="col-start-9 col-end-10">
                    登録日
                </div>
                <div class="col-start-11 col-end-12">
                    返信状態
                </div>
            </div>
            <!-- 問い合わせ -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                <div class="p-4 place-self-center">
                    １
                </div>
                <div class="col-start-2 col-end-6 mt-4">
                   販売者登録をしたいんですけど、できないんです、、
                </div>
                <div class="col-start-7 col-end-8 inline-block align-middle mt-4">
                    ＠＾＾＠
                </div>
                <div class="text-sm col-start-9 col-end-10 mt-4">
                    2021/09/02
                </div>
                <div class="text-sm col-start-11 col-end-12 mt-4">
                    済み
                </div>
            </div>
            <!-- 問い合わせ２ -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                <div class="p-4 place-self-center p-4">
                    ２
                </div>
                <div class="col-start-2 col-end-6 mt-4">
                    サイトに機能を追加して欲しいです！
                </div>
                <div class="col-start-7 col-end-8 inline-block align-middle mt-4">
                    なにいいい
                </div>
                <div class="text-sm col-start-9 col-end-10 mt-4">
                    2021/09/02
                </div>
                <div class="text-sm col-start-11 col-end-12 mt-4">
                    未定
                </div>
            </div>
            <!-- 問い合わせ3 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 border-b border-gray-600">
                <div class="p-4 place-self-center p-4">
                    3
                </div>
                <div class="col-start-2 col-end-6 mt-4">
                    管理者さん、サイトどこで作りましたか？　綺麗ですね！！
                </div>
                <div class="col-start-7 col-end-8 inline-block align-middle mt-4">
                    @T . T@
                </div>
                <div class="text-sm col-start-9 col-end-10 mt-4">
                    2021/09/02
                </div>
                <div class="text-sm col-start-11 col-end-12 mt-4">
                    未定
                </div>
            </div>

            <div class="mt-12"></div>
        </div>
    </div>
@endsection
