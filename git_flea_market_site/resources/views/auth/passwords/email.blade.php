@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <!-- <div class="border-b-4 border-gray-600">
            <h2 class="text-3xl text-gray-800 font-mono">{{ __('パスワード 探し') }}</h2>
        </div> -->

        <div class="grid justify-items-center mt-12 mb-12">
            <div class="box-border w-3/5 p-4 border-2 border-gray-600 grid justify-items-center" >
                <div class="p-1 text-lg"> パスワードリセットメールの転送のため、以下の情報を入力ください。</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="p-4 flex flex-col md:flex-row">
                        <label for="email" class="mb-2 uppercase font-bold text-2xl text-grey-darkest">{{ __('E-Mail Address') }}</label>

                        <div class="">
                            <input id="email" type="email" class="border px-3 h-10 w-max text-grey-darkest ml-6 flex items-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="p-4 grid justify-items-center">
                        <button type="submit" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded">
                            {{ __('リセット メール転送') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
