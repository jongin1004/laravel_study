@extends('layout.main')

@section('content')        
    <div class="justify-center w-5/6">  
        <div>
            <strong>データページ</strong>
        </div>    

        <table class="table w-full mt-4">
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
                        <th scope="row" style="width: 50px;">{{ $data -> id }}</th>
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