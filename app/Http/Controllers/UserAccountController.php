<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\User;
use App\Product;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
   public function profile(){
      $user = Auth::user();
      $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();


   return view('profile.UserAccount')->with('products',$products)->with('user',$user);
}
public function edit(){
   $user = Auth::user();
   return view('profile/edit')->with('user',$user);
}

public function update(Request $request){
   $request->validate([
      'name' => 'required|min:5|max:50',
      'email' => 'email',
      'vat_number' => 'max:13',
      'password' => 'required|min:6|confirmed',
      'password_confirmation' => 'required|min:6'
      
      
   ]);

$input = $request->all();
$user = Auth::user();
$user->name = $input['name'];
$user->id = \Auth::user()->id;
$user->password = Hash::make($input['password']);
// $user ->username = $input['username'];
// $user ->email = $input['email'];

if($request->hasFile('image')){

   $destination_path = 'public/images/users';
   $image = $request->file('image');
   $image_name = $image->getClientOriginalName();

  $path = $request->file('image')->storeAs($destination_path,$image_name);

  $input['image'] = $image_name;    
       
}
$user->save();
session()->flash('message','User record'.' '.$input['name'].' succesfully updated');

return redirect('/profile');
}
}