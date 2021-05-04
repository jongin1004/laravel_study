@extends('layouts.app')

@section('content')
    <div class="flex h-full">
        <div class="w-1/5 border-r-2 border-solid border-gray-600">
            <a href="/mypage/request">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    친구요청 
                </div>   
            </a>       
            <a href="/mypage/myforum">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    내 글
                </div>   
            </a>
            <a href="/mypage/#">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    내 댓글 
                </div>   
            </a>
            <a href="{{ route('box_of_letter') }}">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    쪽지함
                </div>   
            </a>
            <a href="{{ route('bookmark_list') }}">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    스크랩 목록
                </div>   
            </a> 
            <a href="{{ route('blind_list') }}">
                <div class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer">
                    블라인드 유저 관리
                </div>   
            </a> 
        </div>
        <div class="w-4/5 flex flex-col">            
            @if(substr(url()->full(), -6, ) == "mypage")
                <table class="table">                
                    <tbody class="text-white">
                        <tr>
                            <th scope="col" colspan="2" class="text-center">
                                기본정보
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="w-48 text-center border-r-2">
                                <div>아이디</div>
                            </th>
                            <td >
                                <span class="ml-2">{{ $user->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center border-r-2">
                                <div>메일주소</div>
                            </th>
                            <td>
                                <span class="ml-2">{{ $user->email }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center border-r-2">
                                <div>가입일</div>
                            </th>
                            <td>
                                <span class="ml-2">{{ $user->created_at }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center border-r-2">
                                <div>경험치 / 레벨</div>
                            </th>
                            <td>
                                <span class="ml-2">
                                    경험치 : {{ $user->experience_point }} / 
                                    레벨 : {{ floor($user->experience_point/10) }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            @endif
                       
            @yield('request_friend')
            @yield('myforum')
            @yield('box_of_letter')
            @yield('blind_list')
            @yield('bookmark_list')
        </div>        
    </div>
@endsection

