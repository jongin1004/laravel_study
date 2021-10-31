@extends('layout.main')

@section('content')    
    <div class="flex flex-grow items-center">
        データページ
    </div>    
    <div class="flex-grow w-5/6">  
        
        <table class="table w-full">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">会社名</th>
                    <th scope="col">住所</th>
                    <th scope="col">料金</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr class="text-xs">
                        <th scope="row">{{ $data -> id }}</th>
                        <td style="width: 300px;">
                            <span class="ellipsis">{{ $data -> name }}</span>
                        </td>
                        <td style="width: 300px;">
                            <span class="ellipsis">{{ $data -> address }}</span>
                        </td>
                        <td style="width: 100px;">{{ $data -> price }}</td>
                    </tr>            
                @endforeach
            </tbody>                
        </table>

        <div class="d-flex justify-content-center w-full" id="pagination">
            {!! $datas->links() !!}
        </div>
    </div>
    
@endsection