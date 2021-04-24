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
                <table class="table">                
                    <tbody>
                        <tr>
                            <th scope="col" colspan="2" class="text-center">
                                기본정보
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="w-48 text-center">
                                <div>아이디</div>
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div>메일주소</div>
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div>가입일</div>
                            </th>
                            <td>
                                {{ $user->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div>경험치 / 레벨</div>
                            </th>
                            <td>
                                경험치 : {{ $user->experience_point }} / 
                                레벨 : {{ floor($user->experience_point/10) }}
                            </td>
                        </tr>
                    </tbody>
                </table> 
            @endif
                       
            @yield('request_friend')
        </div>        
    </div>
@endsection

