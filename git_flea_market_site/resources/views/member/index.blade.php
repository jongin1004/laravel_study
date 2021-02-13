@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16 h-screen">
    <div class="text-3xl mb-3">＜ユーザー一覧＞ 
        <span class="text-2xl">※クリックすると、詳細情報の確認とユーザーの削除が可能です。</span>
    </div>
    @foreach($users as $user)
    <div class="card">
        <div class="card-body">
            <a href="member/{{$user->id}}" class="text-xl">{{$user->name}}</a>
            </form>
        </div>
    </div>
    @endforeach
    {!! $users->render() !!}
</div>
@endsection