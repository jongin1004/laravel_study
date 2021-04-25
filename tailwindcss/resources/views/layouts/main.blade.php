<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
         <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="#">MovieApp</a>
                </li>
                <li class="ml-16">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">TV shows</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex">
                <div class="relative">
                    <input type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1
                    focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm" placeholder="Search">
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.894 45.894"><path d="M2.512 43.883c1.387 1.307 3.953.834 5.732-1.054l9.364-9.94a17.517 17.517 0 0010.668 3.62c9.73 0 17.618-7.888 17.618-17.619 0-9.729-7.888-17.618-17.618-17.618-9.731 0-17.619 7.888-17.619 17.618 0 3.552 1.06 6.852 2.868 9.618-.988.219-2.009.785-2.853 1.681L0 41.517l2.512 2.366zM28.276 5.971c7.136 0 12.92 5.784 12.92 12.919 0 7.136-5.784 12.92-12.92 12.92-7.135 0-12.92-5.784-12.92-12.92 0-7.135 5.785-12.919 12.92-12.919z" fill="#010002"/></svg>
                    </div>
                </div>
                <div class="ml-4">
                    <a href="#">
                        <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
         </div>
    </nav>
    @yield('content')
</body>
</html>