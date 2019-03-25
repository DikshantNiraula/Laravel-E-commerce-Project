<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = product::all();
    	return view('products.index')->with('products',$products);
    }

    public function create(){
        return view('products.add');
    }

    public function store(Request $request){
        $input  = $request->all();
        $input['user_id'] = 1;
        Product::create($input);

        return redirect(url('products'));
    }
    public function edit($product){
        $product123 = Product::find($product);
        return view('products.edit')->with('product',$product123);

        // return redirect(url('products'));
    }
    public function update($product,Request $request){

        $input = $request->all();
        $product = Product::find($product);

        $product->name = $input['name'];
        $product->category_id = $input['category_id'];
        $product->description  = $input['description'];
        $product->price = $input['price'];

        $product->save();

        return redirect(url('products'));
    
    }

    public function destroy($product){
        Product::find($product)->delete();
        return redirect('products');

    }
}

