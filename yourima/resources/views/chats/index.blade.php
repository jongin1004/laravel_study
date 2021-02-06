@extends('layouts.main')

@section('content')    
    <div class="text-gray-500 m-3"><h4>ID를 클릭하면 지난 메세지도 확인 가능합니다.</h4></div>
    <div class="h-screen flex flex-col" id="app">     
        <div class="flex-1 h-full">
            <!-- current-user 자식 component로 값을 보내는 방법  앞에 v-bind가 붙어야하지만 생략가능-->
            <chat-component 
                :current-user="{{auth() -> id()}}"
                :chat-with="{{ $request -> user_id }}"
                ></chat-component>
        </div>    
    </div>
@endsection