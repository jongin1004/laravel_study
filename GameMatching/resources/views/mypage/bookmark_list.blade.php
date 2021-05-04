@extends('mypage.index')

@section('bookmark_list')
    <div>
        <?php $i=1 ?>
        @foreach ($bookmark_list as $bookmark)
            <a href="/forum/{{ $bookmark->Forum->id }}">
                <div class="border-b-2 mt-2 mx-8 px-4 flex flex-col">
                    <ul class="flex flex-col md:flex-row items-center">
                        <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                            {{ $i }}            
                            <?php $i++ ?>
                        </li>
                        <li class="md:ml-4 mb-2 md:mt-0 w-64">
                            {{ $bookmark->Forum->title}}
                        </li>
                        {{-- style -> 긴 텍스트는 자르고 "..."로 보이도록 --}}
                        <li class="md:ml-4 mb-2 md:mt-0 w-2/4" style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                            {{ $bookmark->Forum->body}}
                        </li>
                        <li class="md:ml-4 mb-2 md:mt-0">
                            {{ $bookmark->Forum->created_at}}
                        </li>
                        <li class="md:ml-6 mb-2 md:mt-0">                
                            <form action="{{ route('delete_bookmark', $bookmark->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">삭제</button>
                            </form>
                        </li>
                    </ul>            
                </div>
            </a>            
        @endforeach

        <div class="mt-4">
            {!! $bookmark_list->render() !!}
        </div>
    </div>


@endsection