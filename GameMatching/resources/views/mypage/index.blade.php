@extends('layouts.app')

@section('content')
    <div>
        @foreach ($request_list as $request)
            <div>
                {{ $request->user->id }}
            </div>
        @endforeach
    </div>
@endsection
