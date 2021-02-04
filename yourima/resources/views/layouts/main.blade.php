<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>yourima</title>

    <!-- Tailwind Css Style -->
    <!--<link rel="stylesheet" href="/css/main.css">-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fomtatwesome -->
    <link rel="stylesheet" href="/css/app.css">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-100">
    <nav class="bg-white">
        
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between px-4 py-6">
                <!-- menu -->
                <ul class="flex flex-col md:flex-row items-cneter py-8 text-gray-700">
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="agree" class="hover:text-gray-500">item 1</a>
                    </li>
                    <li class="md:ml-10 mt-3 md:mt-0">
                        <a href="basket" class="hover:text-gray-500">購入カート</a>
                    </li>
                    <li class="md:ml-10 mt-3 md:mt-0">
                        <a href="inquiry" class="hover:text-gray-500">問い合わせ</a>
                    </li>
                </ul>
                <!-- logo -->
                <div class="flex flex-col md:flex-row items-center">

                        <a href="http://localhost:8000" class="mt-3 mr-12 md:mt-0">
                            <img src="/img/logo3.png" alt="logo">
                        </a>

                </div>

                
                <!-- login, 会員登録　などの　ボタン -->
                <ul class="flex flex-col md:flex-row items-cneter py-8 text-gray-700">
                @guest
                    @if (Route::has('login'))
                        <li class="md:ml-19 mt-3 md:mt-0">
                            <a href="{{ route('login') }}" class="hover:text-gray-500">ログイン</a>
                        </li>
                    @endif
                    <li class="md:ml-5 mt-3 md:mt-0">
                        <span class="hover:text-gray-500">|</span>
                    </li>

                    @if (Route::has('register'))
                        <li class="md:ml-5 md:mr-12 mt-3 md:mt-0">
                            <a href="{{ route('register') }}" class="hover:text-gray-500">会員登録</a>
                        </li>
                    @endif
                @else
                    {{ Auth::user()->name }}
                    <li class="md:ml-10 mt-3 md:mt-0">
                        <a href="{{ route('logout') }}" class="hover:text-gray-500" 
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">ログアウト</a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <li class="md:ml-10 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-500">マイページ</a>
                    </li>
                @endguest
                </ul>
            </div>
    </nav>
    @yield('content')    
    
    @include('layouts.footer')
</body>

</html>