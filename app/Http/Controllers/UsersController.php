<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
public function index(){
$users123 = User::all();
return view('users.index')->with('users',$users123);
}

public function create(){
   return view('users.add');
}

public function store(Request $request){
$input = $request->all();
$input['status'] = 1;
User::create($input);

return redirect(url('users'));
}
public function edit($user){
   $user123 = User::find($user);
   return view('users/edit')->with('user',$user123);
}
public function update($user,Request $request){
$input = $request->all();
$user = User::find($user);
$user ->name = $input['name'];
$user ->password = $input['password'];
$user ->username = $input['username'];
$user ->email = $input['email'];


$user->save();
return redirect('users');
}

public function destroy($user){
   User::find($user)->delete();
   return redirect('users');
}

}