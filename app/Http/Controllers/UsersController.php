<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UsersController extends Controller
{
   public function index(){

   $users = User::paginate(1);
   return view('users.index')->with('users',$users);
}

public function create(){
   return view('users.add');
}

public function store(Request $request){

   $request->validate([
      'name' => 'required||min:5|max:30',
      'password' => 'required|min:5|max:30',
      'email' => 'required'
      
   ]);

$input = $request->all();
// $input['status'] = 1;

User::create($input);
session()->flash('message','User'.' '.$input['name'].' succesfully saved');

return redirect(url('users'));
}

public function edit($user){
   $user = User::find($user);
   return view('users/edit')->with('user',$user);
}

public function update($user,Request $request){
   $request->validate([
      'name' => 'required||min:5|max:30',
      'password' => 'required|min:5|max:30',
   ]);

$input = $request->all();
$user = User::find($user);
$user->name = $input['name'];
$user->password = Hash::make($input['password']);
// $user ->username = $input['username'];
// $user ->email = $request->email;

if($request->hasFile('image')){

   $destination_path = 'public/images/users';
   $image = $request->file('image');
   $image_name = $image->getClientOriginalName();

  $path = $request->file('image')->storeAs($destination_path,$image_name);

  $input['image'] = $image_name;    
       
}


$user->save();
session()->flash('message','User record'.' '.$input['name'].' succesfully updated');
// return view('/profile')->with('user',$user);
return redirect('users')->with('user',$user);
}

public function destroy($user){
   User::find($user)->delete();
   return redirect('users');
}

}