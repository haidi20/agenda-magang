<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use Excel ;

class UserController extends Controller
{
  public function index(){
    $id        = Auth::id();
    $users     = User::all();      // untuk menampilkan semua user pada admin
    $user      = User::find($id);  // untuk identifikasi user
    return view('index.user',['users' => $users, 'user'=>$user]);
  }

  public function store(Request $request){
    $input = User::insert([
      'name'    => request('nama'),
      'email'   => request('email'),
      'password'=> bcrypt(request('password')),
      'level'   => 'user',
      'jabatan' => request('jabatan'),
    ]);

    if($input){
      return redirect('user');
    }
  }

  public function update(Request $request){
    $update = User::where('id' , request('id'))->update([
      'name'    => request('nama'),
      'email'   => request('email'),
      'jabatan' => request('jabatan'),
    ]);
    if($update){
      return redirect('user');
    }
  }

  public function destroy(Request $request , $id){
    // return request('id');
    $user = User::where('id',request('id'));
    $user->delete();
    if($user){
      return redirect('user');
    }
  }
}
