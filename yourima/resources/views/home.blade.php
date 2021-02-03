@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="grid grid-cols-12">
                <h2 class="uppercase tracking-wider text-orange-700 text-lg font-semibold">ALL</h2>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">BOOK</h2>
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">IT</h2>
            </div>
            
            <div class="flex flex-col md:flex-row items-center">
                <div class="relative mt-3 md:mt-6">
                    <input type="text" class="bg-gray-400 rounded-full w-64 pl-8 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">                                
                        <i class="fas fa-search mt-2 ml-3"></i>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <!-- <img src="/img/avatar.png" alt="avatar" class="rounded-full w-8 h-8">  -->
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mt-3 mb-20">
                <div class="mt-8">
                   <a href="./next.php">
                       <img src="/img/ex/ex1.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Home</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">100%</span>
                            <span class="mx-2">|</span>
                            <span>Jan 20, 1752</span>
                        </div>
                        <div class="text-sm">
                            head office, Satisfaction No. 1, Visiting Jeongjo in the Joseon Dynasty
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex2.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Daejeon</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">90%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 1988</span>
                        </div>
                        <div class="text-sm">
                            Close to Seoul, Next to the place I went to Sejong the Great Hot Spring
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex3.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Dae-gu</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Jul 20, 1988</span>
                        </div>
                        <div class="text-sm">
                            Reply Nothing to do with 1988, A very hot neighborhood
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex4.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Busan</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span>April 20, 1949</span>
                        </div>
                        <div class="text-sm">
                            Open on '6.25', The beginning of marine head design
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex5.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Cheonan</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">95%</span>
                            <span class="mx-2">|</span>
                            <span>Oct. 20, 1918</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Opened to promote democracy and people, The existence of Yu Gwan-soon's autograph
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex6.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Pangyo</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">75%</span>
                            <span class="mx-2">|</span>
                            <span>Nov 20, 2018</span>
                        </div>
                        <div class="text-sm">
                            NC software exists, Blade and Soul Fuck
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex7.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Asan</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">65%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 1994</span>
                        </div>
                        <div class="text-sm">
                            King Sejong really bathes in hot springs, Not related to the hot spring.
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/m1.jpg" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Suwon</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Dec 20, 2020</span>
                        </div>
                        <div class="text-sm">
                            Suwon seasoned rib chicken is famous.
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                   <a href="#">
                       <img src="/img/ex/ex8.png" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Seven Knights 2</a>
                        <div class="flex items-center text-sm mt-1">
                            <span><i class="fas fa-star text-yellow-400"></i></span>
                            <span class="ml-1">12%</span>
                            <span class="mx-2">|</span>
                            <span>Jan 18, 2021</span>
                        </div>
                        <div class="text-sm">
                            Don't marvel, Please give me some immortal items.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
