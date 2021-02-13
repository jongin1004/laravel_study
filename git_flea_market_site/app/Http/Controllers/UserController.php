<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index(){
    $users = User::OrderBy('name', 'desc') -> paginate(5);
    return view('member.index',[
      'users' => $users
    ]);
  }

  public function show($member){
    $user=User::find($member);

    return view('member.show',[
      'user' => $user
    ]);
  }

  public function destroy($member){
    $user = User::find($member);
    $user->delete();
    return redirect('member');

  }
}
