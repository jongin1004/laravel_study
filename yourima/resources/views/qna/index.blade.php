@extends('layouts.main')

@section('content')
<script>
function myFunction(num) {
  var x = document.getElementById("textarea"+num);
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<div class="h-screen px-64 mt-5">
    <div class="float-right">
        <a href="/qna/create">
            <button class= "bg-blue-400 px-4 py-2 text-white hover:bg-blue-600">create</button>
        </a>
    </div>
    <h1 class="text-3xl font-bold">QnA</h1>
    <ul>
        @foreach($qnas as $qna)
            <a onclick="myFunction({{ $qna -> id }})">
                <li class="border-4 px-2 py-2 mt-4">タイトル : {{ $qna-> title }} <small class="float-right">created_at {{ $qna -> created_at}}</small><br>
                内容 : {{ $qna -> body }} </li>
                
            </a>
            <div class="">
                @foreach($comments as $comment)
                    @if($comment -> qna_id == $qna -> id)
                    コメント : {{ $comment-> body}}<br>
                    @endif
                @endforeach
            </div>
            
            <div class="mt-5" id="textarea{{ $qna->id }}" style="display:none">
                <form action="/comment" method="POST">
                    @csrf
                    <textarea class="w-fill border-red-500" name="body" id="body"></textarea>
                    <button class="bg-blue-400 px-4 py-2 hover:bg-blue-600 float-right text-white">Submit</button>
                    <input type="hidden" id="qna_id" name="qna_id" value="{{ $qna->id }}">
                </form>
            </div>
        @endforeach
    </ul>    
    {!! $qnas->render() !!}
</div>
@endsection