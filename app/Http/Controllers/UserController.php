<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use Excel ;

class UserController extends Controller
{
  public function index($id){
    $users     = User::all();      // untuk menampilkan semua user pada admin
    $user      = User::find($id);  // untuk identifikasi user
    return view('index.user',['users' => $users, 'user'=>$user]);
  }

  // public function store(Request $request){
  //   $name     = $request->name ;
  //   $pass     = $request->pass ;
  //   $email    = $request->email ;
  //   $jabatan  = $request->jabatan;
  //
  //   $input = User::insert([
  //     'name'    => $name,
  //     'email'   => $email,
  //     'password'=> bcrypt($pass),
  //     'level'   => 'user',
  //     'jabatan' => $jabatan
  //   ]);
  //
  //   if($input){
  //     return redirect('/home/'.Auth::id());
  //   }else{
  //     return redirect('/');
  //   }
  // }
  //
  // public function edit(Request $request){
  //   $id = $request->id ;
  //   $user = User::find($id);
  //   return response()->json($user);
  // }
  //
  // public function update(Request $request){
  //   $id       = $request->id;
  //   $name     = $request->name;
  //   $jabatan  = $request->jabatan ;
  //   $email    = $request->email ;
  //
  //   // return $id . $name . $jabatan. $email ;
  //
  //   $user_input = User::where('id' , $id)->update([
  //       'name'      => $name,
  //       'jabatan'   => $jabatan,
  //       'email'     => $email,
  //   ]);
  //   if($user_input){
  //     $user = User::find($id);
  //     return response()->json($user);
  //   }else{
  //     return 'gagal';
  //   }
  // }
  //
  // public function destroy(Request $request){
  //   $id = $request->id ;
  //   $user = User::where('id',$id);
  //   $user->delete();
  //
  //   if($user){
  //     return $id ;
  //   }
  //   return 'gagal' ;
  // }
}
