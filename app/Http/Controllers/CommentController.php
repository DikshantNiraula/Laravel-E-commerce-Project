<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Comment;

class CommentController extends Controller
{

    public function comment($comment)
    {
        // $products = Product::find($comment);
        // $users = User::all();
        // $comments = Comment::with($products)->orderBy('created_at', 'desc')->get();
        return redirect('products.show')->with('products', $products)->with('comments', $comments)->with('users', $user);
    }

    public function storeComment(Request $request)
    {

        $request->validate([
            'comment' => 'required|min:5|max:300'
        ]);


        $input = $request->all();
        // $products = Product::all();

        $input['user_id'] = \Auth::user()->id;

        // $input['product_id'] = 2;


        Comment::create($input);
        // session(['message' => 'product succesfully added']);
        session()->flash('your comment was Succesfully added');
        return redirect()->back();
    }


    public function delete($comment)
    {
        Comment::find($comment)->delete();
        return redirect('/');
        // return \App::make('redirect')->refresh()->with('flash_success', 'Thank you,!');

    }
}
