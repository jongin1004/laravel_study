<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class MypageController extends Controller
{

  public function index(){
    
    $user = User::find(auth()->id());
    $orders = Order::where('user_id', auth()->id())->get();
    return view('mypage.index', [
      'user' => $user,
      'orders' => $orders
    ]);
}

public function create(){
    
    return view('mypage.create');
}

public function store(Request $request){

    /* $board = Board::create(request(['title','stroy])) >>>>
        이렇게 사용할시에는 function store() 이렇게 사용가능
        괄호 안에 Request $request 필요 없음*/
        
    $user = User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'adress'=>$request->input('address')
    ]);
    return redirect('/mypage/'.$users->id);
}

public function show(User $user){

    return view('mypage.index', [
        'user' => $user
    ]);
}

public function edit(User $user){

    $user = User::find(auth()->id());

    return view('mypage.edit', [
        'user' => $user
    ]);
}

public function update(User $user){

    request()->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required'
      ]);
      $user = User::find(auth()->id());

        $user->update(request(['name', 'email', 'address']));

        return redirect('/mypage');
}

public function destroy(User $user){

    $user = User::find(auth()->id());

    $user->delete();

    return redirect('/');
}

}