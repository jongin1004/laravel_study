@extends('layout')

@section('title')
  laravel
@endsection

@section('content')
  welcome mypage~!
  @foreach($books as $book)
    <li>{{$book}}</li>
  @endforeach
@endsection

