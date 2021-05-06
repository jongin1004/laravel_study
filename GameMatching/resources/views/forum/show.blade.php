@extends('layouts.app')

@section('content')
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
    내용
    <div class="border p-3 my-3">{{ $forum -> body }}</div>
    
    <div class="mt-4 text-center">
        <form action="/forum/recommend" method="POST">
            @csrf            
            <input type="hidden" id="forum_id" name="forum_id" value="{{ $forum->id }}">
            <input type="hidden" id="user_id" name="user_id" value="{{ $forum->user->id }}">
            <button class="flex-initial bg-blue-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="good">추천</button>
            <span class="mx-4">{{ $forum->number_of_recommend }}</span>
            <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300" type="submit" name="recommend" value="bad">비추천</button>
        </form>
    </div>
    
    <div class="float-right">
        <form action="{{ route('bookmark') }}" method="POST">
            @csrf
            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
            <button class="flex-initial bg-gray-500 px-4 py-2 text-white hover:bg-red-300">스크랩</button>
        </form>            
    </div>
</div>
@endsection