<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use App\User;
use App\Brand;
use App\Product;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->paginate(9);
        $categories = Category::all();
        return view('products.index')->with('products',$products)->with('categories',$categories);
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        if(Auth::user())
        return view('products.add')->with('categories',$categories)->with('brands',$brands);
        else
        return view('auth.login');
    }

    public function store(Request $request){

        // return $request;
        $request->validate([
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5|max:50',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required'
        ]);


        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        
        if($request->hasFile('image')){

            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

           $path = $request->file('image')->storeAs($destination_path,$image_name);

           $input['image'] = $image_name;    
                
        }
                
       $product = Product::create($input);

       Mail::send('emails.productCreated', $product->toArray(), function($message){
           $message->to('dikshantniraula351@gmail.com', 'Dikshant niraula')
           ->subject('Product created Subject');
       });
        

        // session(['message' => 'product succesfully added']);
        session()->flash('message',$input['name'].' succesfully saved');
        return redirect(url('products'));       
    }
    public function edit($product){
        $product = Product::find($product);
        $brands = Brand::all();
        $categories = Category::all();
        if(Auth::user())
        return view('products.edit')->with('product',$product)->with('categories',$categories)->with('brands',$brands);
        else
        return view('auth.login');
    }
    public function update($product,Request $request){

        $request->validate([
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5|max:50',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required'

        ]);

        $input = $request->all();
        $product = Product::find($product);

        $product->name = $input['name'];
        $product->category_id = $input['category_id'];
        $product->description  = $input['description'];
        $product->price = $input['price'];
        $product->quantity = $input['quantity'];
        $product->brand_id = $input['brand_id'];

        $product->save();
        session()->flash('message',$input['name'].' succesfully updated');

        return redirect(url('products'));
    
    }

    public function destroy($product){
         Product::find($product)->delete();
        return redirect('products');
    }

    public function show($product){
    $products = Product::find($product);
    $users = User::all();
    $comments = $products->comments;    

        return view('products.show')->with('product',$products)->with('user',$users)->with('comments',$comments);
    }

     
}

