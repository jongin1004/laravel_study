@extends('layouts.app')

@section('content')
<script>
// function myFunction(num) {
//   var x = document.getElementById("textarea"+num);
//   if (x.style.display === "block") {
//     x.style.display = "none";
//   } else {
//     x.style.display = "block";
//   }
// }
</script>
<div class="h-screen px-64 mt-5">
    <div class="float-right">
        <a href="/forum/create">
            <button class= "bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900">Forum登録</button>
        </a>
    </div>
    <div class="border-b-4 border-gray-800 mt-12 mb-5">
        <h1 class="text-3xl font-bold">Forum</h1>
    </div>
    <div class="relative mt-3 md:mt-0">
        <form action="{{ route('search_forum') }}" method="POST">
            @csrf
            <input type="text" class="bg-gray-800 rounded-full w-64 px-6 pl-8 py-1
            focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm" placeholder="Search" name="search_forum">
            <div class="absolute top-0">
                <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.894 45.894"><path d="M2.512 43.883c1.387 1.307 3.953.834 5.732-1.054l9.364-9.94a17.517 17.517 0 0010.668 3.62c9.73 0 17.618-7.888 17.618-17.619 0-9.729-7.888-17.618-17.618-17.618-9.731 0-17.619 7.888-17.619 17.618 0 3.552 1.06 6.852 2.868 9.618-.988.219-2.009.785-2.853 1.681L0 41.517l2.512 2.366zM28.276 5.971c7.136 0 12.92 5.784 12.92 12.919 0 7.136-5.784 12.92-12.92 12.92-7.135 0-12.92-5.784-12.92-12.92 0-7.135 5.785-12.919 12.92-12.919z" fill="#010002"/></svg>
            </div>

            <select class="bg-gray-800 rounded-full px-6 pl-8 py-1" id="search_object" name="search_object">
                <option value="title">제목</option>
                <option value="body">내용</option>
                {{-- <option value="comment">댓글</option> --}}
                <option value="nickname">닉네임</option>
            </select>
        </form>
    </div>

    <ul>
        @foreach($forums as $forum)
            <a href="/forum/{{ $forum->id }}">
                <li class="border-4 border-gray-500 px-2 py-2 mt-4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">제목 : {{ $forum-> title }} <small class="float-right">created_at {{ $forum -> created_at}}</small><br>
                내용 : {{ $forum -> body }}</li>
            </a>             
        @endforeach
    </ul>

    <div class="mt-4">
        {!! $forums->render() !!}
    </div> 
    
</div>
@endsection