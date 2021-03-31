@extends('layouts.app')

@section('content')
    <div class="flex-1">
        {{-- (v-bind) :current-user에 유저의 id를 담아서  아래 컴포넨트로 props로 보낸다.  --}}
        <the-chat :current-user="{{ auth()->id() }}"></the-chat>
    </div>
@endsection
