@extends('layout')

@section('title')
  Tasks
@endsection


@section('content')
<div class="px-64">
  <h1 class="font-bold text-3xl">Task list</h1>
  <ul>
    @foreach($Tasks as $Task)
    <a href="/tasks/{{ $Task -> id }}">
      <li class="border my-3 p-3">Title : {{ $Task -> title}} <small class="float-right">created_at {{$Task -> created_at }}</small></li>
    </a>
    @endforeach
  </ul>
</div>
@endsection