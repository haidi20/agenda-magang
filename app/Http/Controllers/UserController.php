<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use Excel ;
use Auth ;


class UserController extends Controller
{
  public function index(){
    $id        = Auth::id();
    $users     = User::orderBy('name','asc')->get(); // untuk menampilkan semua user pada admin
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
      return redirect('user')->with('note' , 'Add User Berhasil');
    }else{
      return redirect('user')->with('note' , 'Maaf, Add User Gagal');
    }
  }

  public function update(Request $request){
    $update = User::where('id' , request('id'))->update([
      'name'    => request('nama'),
      'email'   => request('email'),
      'jabatan' => request('jabatan'),
    ]);
    if($update){
      return redirect('user')->with('note' , 'Update User Berhasil');
    }else{
      return redirect('user')->with('note' , 'Maaf, Update User Gagal');
    }
  }

  public function destroy(Request $request , $id){
    // return request('id');
    $user = User::where('id',request('id'));
    $user->delete();
    if($user){
      return redirect('user')->with('note' , 'Delete User Berhasil');
    }else{
      return redirect('user')->with('note' , 'Maaf, Delete User Gagal');
    }
  }
}
