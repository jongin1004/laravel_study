@extends('mypage.index')

@section('request_friend')
    @foreach ($request_list as $request)
        <div class="border p-3">                 
            {{ $request->user->name }}님으로 부터 친구추가 요청이 있습니다.
            <div class="float-right">
                {{-- 버튼을 두개만들어서, 버튼에 따라서 action을 다르게 주기위함 --}}
                <form method="POST" name="form">
                    @csrf
                    <input type="hidden" value="{{ $request->from }}" name="request_from">
                    <input type="hidden" value="{{ $request->id }}" name="request_id">
                    <input class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
                    type="submit" value="수락" onclick="javascript: form.action='/friend/accept';"/>
                    <input class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
                    type="submit" value="거절" onclick="javascript: form.action='/friend/refusal';"/>
                </form>
            </div>
        </div>                
    @endforeach
@endsection