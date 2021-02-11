@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16 h-screen">
    <div class="popular-movies">
        <!-- <div class="border-b-4 border-gray-600">
            <h2 class="text-3xl text-gray-800 font-mono">{{ __('会員登録') }}</h2>
        </div> -->

        <div class="grid justify-items-center mt-12 mb-12">
            <div class="box-border w-1/2 p-4 border-2 border-gray-600 grid justify-items-center" >
                <div class="p-1 mb-5 text-lg"> 以下の情報を入力ください。</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- input nickname -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="name" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('ニックネーム') }}</label>

                        <div>
                            <input id="name" type="text" class="border px-3 w-max text-grey-darkest ml-6 flex items-center @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- input mail -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="email" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('メールアドレス') }}</label>

                        <div>
                            <input id="email" type="email" class="border px-3 w-max text-grey-darkest ml-6 flex items-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- input password -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="password" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('パスワード') }}</label>

                        <div>
                            <input id="password" type="password" class="border px-3 w-max text-grey-darkest ml-6 flex items-center @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- input paaword 確認 -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="password-confirm" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('パスワード 確認') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="border px-3 w-max text-grey-darkest ml-6 flex items-center" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="border-b border-gray-600"></div>
                    <div class="p-1 mt-4 grid justify-items-center"> ✓ 配送のため、情報をご入力ください。</div>
                    <!-- input name -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="real_name" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('本名') }}</label>

                        <div>
                            <input id="real_name" type="text" class="border px-3 w-max text-grey-darkest ml-6 flex items-center" name="real_name" required autocomplete="new-password">
                        </div>
                    </div>
                    <!-- input tel -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="tel" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('電話番号') }}</label>

                        <div>
                            <input id="tel" type="text" class="border px-3 w-max text-grey-darkest ml-6 flex items-center" name="tel" required autocomplete="new-password">
                        </div>
                    </div>
                    <!-- input address -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="address" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('住所') }}</label>

                        <div>
                            <input id="address" type="text" class="border px-3 w-max text-grey-darkest ml-6 flex items-center" name="address" required autocomplete="new-password">
                        </div>
                    </div>
                    <!-- input postal code -->
                    <div class="p-1 flex flex-col md:flex-row">
                        <label for="postal" class="mb-2 uppercase font-bold text-xl text-grey-darkest">{{ __('郵便番号') }}</label>

                        <div>
                            <input id="postal" type="text" class="border px-3 w-max text-grey-darkest ml-6 flex items-center" name="postal" required autocomplete="new-password">
                        </div>
                    </div>
                    <!-- register button -->
                    <div class="p-4 grid justify-items-center">
                        <button type="submit" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded">
                            {{ __('会員登録') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
