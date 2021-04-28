@extends('mypage.index')

@section('myforum')
    <?php $i=1 ?>
    @foreach ($forums as $forum)
        <div class="border-b-2 mt-2 mx-8 px-4 flex flex-col">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                    {{ $i }}            
                    <?php $i++ ?>
                </li>
                <li class="md:ml-4 mb-2 md:mt-0 w-64">
                    {{ $forum->title}}
                </li>
                {{-- style -> 긴 텍스트는 자르고 "..."로 보이도록 --}}
                <li class="md:ml-4 mb-2 md:mt-0 w-2/4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                    {{ $forum->body}}
                </li>
                <li class="md:ml-4 mb-2 md:mt-0 w-12">
                    {{ $forum->number_of_recommend}}
                </li>
                <li class="md:ml-4 mb-2 md:mt-0">
                    {{ $forum->created_at}}
                </li>
            </ul>            
        </div>
    @endforeach
    <div class="mt-4 mx-8">
        {!! $forums->render() !!}
    </div>    
@endsection