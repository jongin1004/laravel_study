@extends('layouts.main')

@section('content')
    <div class="h-screen flex flex-col" id="app">
        <div class="flex-1 h-full">
            <!-- current-user 자식 component로 값을 보내는 방법  앞에 v-bind가 붙어야하지만 생략가능-->
            <chat-component :current-user="{{auth() -> id()}}"></chat-component>
        </div>    
    </div>
@endsection