@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16 h-screen">
    <div class="popular-movies">
        <!-- <div class="border-b-4 border-gray-600">
            <h2 class="text-3xl text-gray-800 font-mono">{{ __('ログイン') }}</h2>
        </div> -->

        <div class="grid justify-items-center mt-12 mb-12">
            <div class="box-border w-3/5 p-4 border-2 border-gray-600 grid justify-items-center" >
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- input email -->
                    <div class="p-2 flex flex-col md:flex-row">
                        <label for="email" class="mb-2 uppercase font-bold text-2xl text-grey-darkest">{{ __('メールアドレス') }}</label>

                        <div class="flex items-center w-1/2 ">
                            <input id="email" type="email" class="border px-3 h-10 w-max text-grey-darkest ml-6 flex items-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <!-- 틀렸을 때 경고문 > 일본어로 변경하기 -->                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- input password -->
                    <div class="p-2 flex flex-col md:flex-row">
                        <label for="password" class="mb-2 uppercase font-bold text-2xl text-grey-darkest">{{ __('パスワード ') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="border px-3 h-10 w-max text-grey-darkest ml-6 flex items-center @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- check remember me -->
                    <div class="grid justify-items-center mt-2">
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <!-- buttons -->
                    <div class="p-4 grid justify-items-center">
                        <button type="submit" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded mb-3">
                            {{ __('ログイン') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="border-b border-gray-800 text-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
