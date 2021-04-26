@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="/img/a.jpg" alt="a" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">신뢰성검사 (2018)</h2>
                 <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>Feb 20, 2020</span>
                    <span class="mx-2">|</span>
                    <span>Action, Thriller, Drama</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias iusto quibusdam sint amet ut enim quod quo provident et reprehenderit consequuntur minus esse nobis, necessitatibus aspernatur a rerum officiis error!
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Choi Jong-in</div>
                            <div class="text-sm text-gray-400">안녕</div>
                        </div>
                        <div class="ml-8">
                            <div>Choi Jong-in</div>
                            <div class="text-sm text-gray-400">안녕</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-pink-500 text-gray-900 rounded font-semibold px-5
                    py-3 hover:bg-pink-600 transition ease-in-out duration-150">
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.816 511.816"><path d="M20.949 298.483v160c0 29.419 23.936 53.333 53.333 53.333h384c29.419 0 53.333-23.915 53.333-53.333v-160H20.949zM252.757 48.776l-79.83 18.944 66.88 98.411 86.464-19.669zM150.741 72.99L64.703 93.384l66.176 97.494 86.592-19.691zM511.274 93.086l-18.155-68.864C488.938 7.475 471.786-3.063 454.868.798l-71.68 17.024 68.011 100.267 52.117-11.861c2.837-.64 5.269-2.411 6.763-4.885s1.92-5.441 1.195-8.257zM360.981 23.091L275.413 43.4l73.642 97.899 79.808-18.155zM128.447 191.838L94.314 277.15h83.691l34.133-85.312zM235.114 191.838l-34.133 85.312h83.69l34.134-85.312zM500.949 191.838h-52.501l-34.133 85.333h97.301v-74.667a10.644 10.644 0 00-10.667-10.666zM341.781 191.838l-34.134 85.312h83.67l34.154-85.312zM42.517 98.675l-17.387 4.117c-8.469 1.92-15.637 7.061-20.181 14.443-4.544 7.403-5.888 16.107-3.776 24.533l19.776 78.165v57.216h50.389l32.021-80.021 5.205-1.173-66.047-97.28z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/a.jpg" alt="a" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 mt-1">신뢰성공학</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/a.jpg" alt="a" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 mt-1">신뢰성공학</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/a.jpg" alt="a" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 mt-1">신뢰성공학</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/a.jpg" alt="a" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 mt-1">신뢰성공학</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/a.jpg" alt="a" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 mt-1">신뢰성공학</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                            <span class="ml-1">85%</span>
                            <span class="mx-2">|</span>
                            <span>Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
@endsection