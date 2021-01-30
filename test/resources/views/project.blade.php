@extends('layout')

@section('content')
    @foreach($projects as $project)
        title : {{ $project -> title }}<br>
        body : {{ $project -> body }}<br>
    @endforeach
@endsection