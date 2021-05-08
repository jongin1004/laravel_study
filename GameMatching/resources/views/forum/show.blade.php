@extends('layouts.app')

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

<div class="px-64 mt-4">
    <div class="flex mb-4">
        <a href="/forum" class="flex-1">
            <h1 class="font-bold text-3xl">detail forum</h1>
        </a>
        @if (auth()->id() == $forum -> user_id)
            <a href="/forum/{{ $forum -> id }}/edit">
                <button class="flex-initial bg-gray-500 px-4 py-2 mx-2 text-white hover:bg-green-300">Edit</button>
            </a>
        
            <form action="/forum/{{ $forum -> id }}" method="POST">
                @method('delete')
                @csrf
                <button class="flex-initial bg-gray-500 px-4 py-2 text-white hover:bg-red-300">Delete</button>
            </form>
        @endif
    </div>

    제목 : {{ $forum -> title }} <small class="float-right">created_at {{ $forum -> created_at }}</small><br>
    <small class="float-right">updated_at {{ $forum -> updated_at }}</small><br>

    {{-- 아코디언패널 --}}
    <section class="popup_user">
        <dl>
            <dt>                
                <small class="float-right hover:underline" id="setTimeout_xp">작성자 {{ $forum->user->name }}</small>
                <span id="show_xp" style="display:none;" class="float-right bg-gray-400">XP:{{ $forum->user->experience_point }}, Lv:{{ floor($forum->user->experience_point/10) }}/40</span><br>
            </dt>
            <dd style="display:none;" class="float-right bg-gray-500 border-4 border-blue-400 rounded-md px-2 py-2"> 
                <a href="/friend/{{ $forum->user->id }}">친구추가</a><br>
                <a href="/letter/{{ $forum->user->id }}" onclick="window.open(this.href, '_blank', 'width=600px,height=480px,toolbars=no,scrollbars=no'); return false;">쪽지 보내기</a><br>
                <a href="{{ route('user_info', $forum->user->id ) }}">프로필 보기</a><br>
                <a href="{{ route('blind', $forum->user->id ) }}">블라인드 추가</a>
            </dd>
        </dl>
    </section>

    {{-- 게시글 내용 --}}
    내용
    <div class="border-2 rounded-lg p-3 my-3">{{ $forum -> body }}</div>
    
    {{-- 게시글 추천/비추천 --}}
    <div class="my-2 pb-4 text-center border-b-2">
        <form action="/forum/recommend" method="POST">
            @csrf            
            <input type="hidden" id="forum_id" name="forum_id" value="{{ $forum->id }}">
            <input type="hidden" id="user_id" name="user_id" value="{{ $forum->user->id }}">
            <button class="flex-initial bg-blue-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="good">추천</button>
            <span class="mx-4">{{ $forum->number_of_recommend }}</span>
            <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="bad">비추천</button>
        </form>
    </div>
    
    {{-- 게시글 스크랩 --}}
    <div class="text-right pb-2 mt-2">
        <form action="{{ route('bookmark') }}" method="POST">
            @csrf
            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
            <button class="flex-initial bg-gray-500 px-4 py-2 text-white hover:bg-red-300">스크랩</button>
        </form>            
    </div>

    {{-- 댓글 index --}}
    @if ($comments != null)
        <div>
            <div class="border-2 rounded-lg py-2 mt-1 text-center">
                댓글
            </div>
            <ul>
                @foreach ($comments as $comment)
                    <li class="py-4 border-b-2">
                        <div class="float-right">
                            <span>
                                <a href="#">추천</a>
                                <a href="#">비추천</a>
                            </span>
                            <a onclick="myFunction({{ $comment->id }})">댓글</a>
                        </div>
                        <div class="mb-4">
                            <span>{{ $comment->user->name }}</span>
                            <span class="text-xs ml-4"> {{ $comment->created_at }}</span>
                        </div>
                        
                        <div>
                            {{ $comment -> body }}
                        </div>
                    </li>
                    
                    {{-- 추가댓글 form 태그  --}}
                    <div class="p-4" id="textarea{{ $comment->id }}" style="display:none">
                        <h1 class="text-xl mb-3">대댓글 작성</h1>
                        <form action="{{ route('create_additional_comment') }}" method="POST">
                            @csrf
                            <ul class="flex flex-col md:flex-row items-end">
                                <li class="w-full">
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <textarea class="w-full h-32 px-3 py-1 border rounded-lg bg-gray-600" name="body" placeholder="상대방에게 상처가 되는 댓글은 삼가해주세요!"></textarea>
                                </li>
                                <li>
                                    <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 float-right w-32 ml-2 mb-1">작성</button>
                                </li>
                            </ul>                                                                                                    
                        </form>
                    </div>
                @endforeach
            </ul>   
            <div class="py-2">
                {!! $comments->render() !!}
            </div>
        </div>
    @endif

    {{-- 댓글 작성 form태그  --}}
    <div class="flex flex-col mt-2 border-2 rounded-lg p-4">        
        <form action="{{ route('create_comment') }}" method="POST">
            @csrf
            <ul class="flex flex-col md:flex-row items-end">
                <li class="w-full">
                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                    <textarea class="w-full h-32 bg-gray-600 text-white" name="body" placeholder="상대방에게 상처가 되는 댓글은 삼가해주세요!"></textarea>
                </li>
                <li>                    
                    <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 float-right w-32 ml-2 mb-1">작성</button>
                </li>
            </ul>            
        </form>
    </div>
</div>
@endsection