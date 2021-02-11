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
            <button class= "bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900">QnA登録</button>
        </a>
    </div>
    <div class="border-b-4 border-gray-800 mt-12 mb-5">
        <h1 class="text-3xl font-bold">QnA</h1>
    </div>
    <ul class="p-3">
        @foreach($qnas as $qna)
            <a onclick="myFunction({{ $qna -> id }})">
                <li class="border-4 border-gray-500 px-2 py-2 mt-4">タイトル : {{ $qna-> title }} <small class="float-right">created_at {{ $qna -> created_at}}</small><br>
                内容 : {{ $qna -> body }} </li>
                
            </a>
            <div class="p-2 mb-5">
                @foreach($comments as $comment)
                    @if($comment -> qna_id == $qna -> id)
                    <div class="p-1 break-words">
                        コメント : {{ $comment-> body}}
                    </div>
                    <div class="border-b border-gray-500"></div>
                    @endif
                @endforeach
            </div>

            <!-- 에베베ㅔ베 -->
            
            <div class="p-4" id="textarea{{ $qna->id }}" style="display:none">
                <form action="/comment" method="POST">
                    @csrf
                    <h1 class="text-xl mb-3">返信の内容を作成してください。</h1>
                    <textarea class="px-3 py-1 w-4/5 border border-gray-600" name="body" id="body"></textarea>
                    <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 float-right">返信登録</button>

                    <input type="hidden" id="qna_id" name="qna_id" value="{{ $qna->id }}">
                </form>
            </div>
        @endforeach
    </ul>    
    {!! $qnas->render() !!}
</div>
@endsection