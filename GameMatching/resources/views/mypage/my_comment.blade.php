@extends('mypage.index')

@section('myComment')
    <?php $i=1 ?>
    @foreach ($comments as $comment)
        {{-- <a href="/forum/{{ $forum->id }}"> --}}
            <div class="border-b-2 px-4 py-2 mt-2 flex flex-col">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                        {{ $i }}            
                        <?php $i++ ?>
                    </li>
                    {{-- <li class="md:ml-4 mb-2 md:mt-0 w-64">
                        {{ $comment->}}
                    </li> --}}
                    {{-- style -> 긴 텍스트는 자르고 "..."로 보이도록 --}}
                    <li class="md:ml-4 mb-2 md:mt-0 w-2/4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                        {{ $comment->body}}
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0 w-12">
                        {{-- {{ $forum->number_of_recommend}} --}}
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0">
                        {{ $comment->created_at}}
                    </li>
                </ul>            
            </div>
        {{-- </a> --}}
    @endforeach
    <div class="mt-4 mx-8">
        {{-- {!! $forums->render() !!} --}}
    </div>    
@endsection