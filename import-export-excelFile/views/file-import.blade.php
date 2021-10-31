@extends('layout.main')

@section('content')
    <div class="flex flex-grow items-center">
        <span>選考の機会を頂きまして誠にありがとうございます。</span> 
    </div>
    
    <div class="flex-grow">
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <button class="btn btn-primary mb-2 text-xs">アップロード</button>
            <a class="btn btn-success mb-2 text-xs" href="{{ route('file-export') }}">ダウンロード</a>
            <a class="btn btn-success mb-2 text-xs" href="{{ route('data-show') }}">データページ</a>
            <a class="btn btn-success mb-2 text-xs" href="{{ route('file-reset') }}">データリセット</a>            
        </form>

        @if ($message = Session::get('error'))
            <div class="alert alert-success alert-block">
                <p><strong>注意</strong></p>
                <small>{{ $message }}</small>
            </div>
        @elseif ( $message = Session::get('success') )
            <div class="alert alert-success alert-block">
                <p><strong>成功</strong></p>
                <small>{{ $message }}</small>
            </div>
        @endif
    </div>
@endsection