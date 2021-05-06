@extends('mypage.index')

@section('box_of_letter')
    <div>
        <div class="flex flex-col mb-4">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a class="bg-gray-500 px-2 py-1 h-2 text-white hover:bg-gray-300 no-underline" href="{{ route('letter_filter', 1) }}">전체</a>
                </li>
                <li>
                    <a class="bg-gray-500 px-2 py-1 h-2 text-white hover:bg-gray-300 ml-2 no-underline" href="{{ route('letter_filter', 2) }}">받은 쪽지</a>
                </li>
                <li>
                    <a class="bg-gray-500 px-2 py-1 h-2 text-white hover:bg-gray-300 ml-2 no-underline" href="{{ route('letter_filter', 3) }}">보낸 쪽지</a>                    
                </li>
            </ul>
        </div>
        <?php $no=1 ?>
        @foreach ($letters as $letter)
            <div class="border-b-2 px-4 py-2 mt-2 flex flex-col">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                        {{ $no }}            
                        <?php $no++ ?>
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0 w-64">
                        {{ $letter->title}}
                    </li>
                    {{-- style -> 긴 텍스트는 자르고 "..."로 보이도록 --}}
                    <li class="md:ml-4 mb-2 md:mt-0 w-2/4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                        {{ $letter->body}}
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0">
                        {{ $letter->created_at}}
                    </li>
                </ul>            
            </div>
        @endforeach           
    </div>

    <div class="mt-4 mx-8">
        {!! $letters->render() !!}
    </div> 
@endsection