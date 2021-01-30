@extends('layout')

@section('title')
  Jongin_Laravel
@endsection

@section('content')
<h1 class="bg-red-800">hello</h1>
<ul>
    @foreach($books as $book)
        <li>{{ $book }}</li>   
    @endforeach
</ul>
@endsection