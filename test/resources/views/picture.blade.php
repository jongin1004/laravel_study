@extends('layout')

@section('content')
<div class="container">
    <!-- @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif -->

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach

    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo">
        <input type="submit" value="upload">
    </form>

    <div>
        @php
            $photos = App\Models\Photo::all();
        @endphp

        @foreach($photos as $photo)
            <img src="{{ $photo -> url }}" class="img-fluid">
        @endforeach
    </div>
</div>
@endsection