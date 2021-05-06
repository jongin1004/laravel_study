@extends('layouts.app')

@section('content')
    <div class="mx-4 mt-4">            
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
    </div>        
@endsection

