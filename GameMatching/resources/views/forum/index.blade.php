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
    <ul class="p-3">
        @foreach($forums as $forum)
            <a href="/forum/{{ $forum->id }}">
                <li class="border-4 border-gray-500 px-2 py-2 mt-4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">タイトル : {{ $forum-> title }} <small class="float-right">created_at {{ $forum -> created_at}}</small><br>
                内容 : {{ $forum -> body }}</li>
            </a>             
        @endforeach
    </ul>    
    {!! $forums->render() !!}
</div>
@endsection