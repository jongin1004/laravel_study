@extends('layout')

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

<div class="px-64 mt-5">
    <div class="float-right">
        <a href="/qna/create">
            <button class= "bg-blue-400 px-4 py-2 text-white hover:bg-blue-600">create</button>
        </a>
    </div>
    <h1 class="text-3xl font-bold">QnA</h1>
    <ul>
        @foreach($qnas as $qna)
            <a onclick="myFunction({{ $qna -> id }})">
                <li class="border-4 px-2 py-2 mt-4">Title : {{ $qna-> title }} <small class="float-right">created_at {{ $qna -> created_at}}</small></li>
            </a>
            <div class="mt-5" id="textarea{{ $qna->id }}" style="display:none">
                <form action="#">
                    <textarea class="w-fill border-red-500" name="comment" id="comment"></textarea>
                    <button class="bg-blue-400 px-4 py-2 hover:bg-blue-600 float-right">Submit</button>
                </form>
            </div>
        @endforeach
    </ul>

    
</div>
@endsection