@extends('layout')

@section('content')
  <li>Project list</li>
  @foreach($projects as $project)
    title : {{$project -> title}}<br>
    description : {{$project -> description}}<br>

  @endforeach
@endsection