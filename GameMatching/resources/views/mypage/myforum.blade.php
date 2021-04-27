@extends('mypage.index')

@section('myforum')
    <?php $i=1 ?>
    @foreach ($forums as $forum)
        <div class="border-b-2 mt-2 px-4 flex flex-col">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                    {{ $i }}            
                    <?php $i++ ?>
                </li>
                <li class="md:ml-4 mb-2 md:mt-0 w-64">
                    {{ $forum->title}}
                </li>
                <li class="md:ml-4 mb-2 md:mt-0">
                    {{ $forum->body}}
                </li>
            </ul>            
        </div>
    @endforeach
@endsection