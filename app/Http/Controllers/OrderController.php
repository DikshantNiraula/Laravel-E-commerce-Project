<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;   
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // public function order(){
    //     $users = User::all();
    //     return view('order/orderForm')->with('users',$users);
    // }
    public function index(){
        $product = product::all();
        $users = User::all();
        $orders = Order::orderBy('created_at','desc')->get();
return view('order/orders')->with('product',$product)->with('users',$users)->with('orders',$orders);
    }

    public function order(Product $product){
        // $product = Product::find($product);
        return view('order.orderForm')->with('product',$product);
    }

    public function store(Request $request,$product){

        // return $request;
        $request->validate([
            'address' => 'required|min:5|max:50',
            'phonenumber' => 'required',
            'quantity' => 'required'
        ]);


        $input = $request->all();
        // $products = Product::find($product);

        $input['user_id'] = \Auth::user()->id;
        // $input['email'] = \Auth::user()->email;
        
        // $input['product_id'] = 2;
        // $input['price'] = $products->price;

      
        Order::create($input);
        // session(['message' => 'product succesfully added']);
        session()->flash('message',$input['product_id'].' succesfully ordered');
        return redirect(url('products'));
    }
   

    public function delete($order){
        Order::find($order)->delete();
        return redirect()->back();
    }

    public function myOrders(){
        $user = Auth::user();
       $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('order.myOrders')->with('user',$user)->with('orders',$orders);
    }
    public function viewOrder(){
        $user = Auth::user();
       $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('order.view')->with('user',$user)->with('orders',$orders);
    }
}
