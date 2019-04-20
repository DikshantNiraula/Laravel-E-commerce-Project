<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;


class BrandsController extends Controller
{
    public function index(){
        $brands = Brand::withCount('products')->paginate(3);
        return view('brands.index')->with('brands',$brands);
        }
        
        public function create(){
           return view('brands.add');
        }
        
        public function store(Request $request){
        
           $request->validate([
              'name' => 'required|min:3|max:30',
              'status' => 'required|boolean'
        
           ]);
        
        $input = $request->all();
        
        Brand::create($input);
        session()->flash('message','Brand'.' '.$input['name'].' succesfully saved');
        
        return redirect(url('brands'));
        }
        
        public function edit($brands){
           $brands = Brand::find($brands);
           return view('brands/edit')->with('brand',$brands);
        }
        public function update($brands,Request $request){
            $request->validate([
                'name' => 'required||min:3|max:30',
                'status' => 'required|boolean'
             ]);
        
        $input = $request->all();
        $brands = Brand::find($brands);
        $brands ->name = $input['name'];
        // $brands ->brandsname = $input['brandsname'];
        
        
        $brands->save();
        session()->flash('message','brands record'.' '.$input['name'].' succesfully updated');
        
        return redirect('brands');
        }
        
        public function destroy($brands){
           Brand::find($brands)->delete();
           return redirect('brands');
        }
        
        public function show($brand){
        
           $products = Product::where('brand_id',$brand)->paginate(3);
           return view('products.index',compact('products'));
        
        }
}
