@extends('layouts.app')

@section('content')
    <div class="flex h-full">
        <div class="w-1/5 border-r-2 border-solid border-gray-600">
            친구요청
        </div>
        <div class="w-4/5 flex flex-col">
            @foreach ($request_list as $request)
                <div class="border p-3">                 
                    {{ $request->user->name }}님으로 부터 친구추가 요청이 있습니다.
                    <div class="float-right">
                        {{-- <a href="friend/request/{{ $request->id }}/1">
                            <button class="bg-blue-500 px-4 py-2 text-white hover:bg-red-300">수락</button>
                        </a>
                        <a href="#">
                            <button class="bg-red-500 px-4 py-2 text-white hover:bg-red-300">거절</button>
                        </a> --}}
                        {{-- 버튼을 두개만들어서, 버튼에 따라서 action을 다르게 주기위함 --}}
                        <form method="POST" name="form">
                            @csrf
                            <input type="hidden" value="{{ $request->from }}" name="request_id">                            
                            <input class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
                            type="submit" value="수락" onclick="javascript: form.action='/friend/accept';"/>
                            <input class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
                            type="submit" value="거절" onclick="javascript: form.action='/friend/refusal';"/>
                        </form>
                    </div>
                </div>                
            @endforeach
        </div>        
    </div>
@endsection
