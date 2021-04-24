@extends('layouts.app')

@section('content')
    <div class="flex h-full">
        <div class="w-1/5 border-r-2 border-solid border-gray-600">
            <a href="/mypage/request">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    친구요청 
                </div>   
            </a>       
            <a href="/mypage/#">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    내 글
                </div>   
            </a>
            <a href="/mypage/#">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    내 댓글 
                </div>   
            </a>  
        </div>
        <div class="w-4/5 flex flex-col">
            @if (substr(url()->previous(), -6, ) == "mypage")
                <div class="">
                    {{ $user->id }}                    
                </div>   
            @endif
                       
            @yield('request_friend')
        </div>        
    </div>
@endsection

