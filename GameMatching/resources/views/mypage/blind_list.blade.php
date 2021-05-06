@extends('mypage.index')

@section('blind_list')
    <div>
        <?php $no=1 ?>
        @foreach ($blind_list as $blind_user)
            <div class="border-b-2 px-4 py-2 mt-2 flex flex-col">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-4 mb-2 md:mt-0 w-8">                    
                        {{ $no }}            
                        <?php $no++ ?>
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0 md:w-3/4">
                        {{ $blind_user->user->name }}
                    </li>
                    <li class="md:ml-4 mb-2 md:mt-0">
                        {{ $blind_user->created_at}}
                    </li>
                    <li class="md:ml-6 mb-2 md:mt-0">                
                        <form action="{{ route('delete_blind', $blind_user->user->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="flex-initial bg-red-500 px-4 py-2 text-white hover:bg-red-300">삭제</button>
                        </form>
                    </li>
                </ul>            
            </div>
        @endforeach
    </div>
    <div class="mx-4 mt-2">
        {!! $blind_list->render() !!}
    </div>
@endsection