@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Task Detail</h2>
                </div>
                <div class="card">
                    <div class="card-header">{{$task->title}}</div>

                    <div class="card-body">
                        {{$task->description}}
                    </div>
                </div>

                <div class="card-footer">
                    {{-- 사용자에게 업데이트 권한이 있는 사람만 버튼이 보이도록 --}}
                    @can('update', $task)
                    <a href="/tasks/{{$task->id}}/edit" class="btn btn-warning">Edit Task</a>
                    <form style="float:right" method="POST" action="/tasks/{{$task->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endcan
                </div>                
            </div>
        </div>
    </div>
@endsection