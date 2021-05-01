@extends('mypage.index')

@section('blind_list')
    <div class="mx-4">
        <?php $no=1 ?>
        @foreach ($blind_list as $blind_user)
            <div class="border-b-2 px-4 py-2 flex flex-col">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                        {{ $no }}            
                        <?php $no++ ?>
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0 w-2/3">
                        {{ $blind_user->user->name}}
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0">
                        {{ $blind_user->created_at}}
                    </li>
                </ul>            
            </div>
        @endforeach
    </div>
@endsection