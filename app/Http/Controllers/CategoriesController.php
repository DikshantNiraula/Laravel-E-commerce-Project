   <?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
public function index(){
$categories = Category::withCount('products')->paginate(8);
return view('categories.index')->with('categories',$categories);
}

public function create(){
   return view('categories.add');
}

public function store(Request $request){

   $request->validate([
      'name' => 'required|min:3|max:30',
      'status' => 'required|boolean'

   ]);

$input = $request->all();
// $input['status'] = 1;

category::create($input);
session()->flash('message','Category'.' '.$input['name'].' succesfully saved');

return redirect(url('categories'));
}
public function edit($categories){
   $categories = category::find($categories);
   return view('categories/edit')->with('category',$categories);
}
public function update($categories,Request $request){
    $request->validate([
        'name' => 'required|min:3|max:30',
        'status' => 'required|boolean'
     ]);

$input = $request->all();
$categories = category::find($categories);
$categories ->name = $input['name'];
// $categories ->categoriesname = $input['categoriesname'];


$categories->save(); 
session()->flash('message','categories record'.' '.$input['name'].' succesfully updated');

return redirect('categories');
}

public function destroy($categories){
   category::find($categories)->delete();
   return redirect('categories');
}

public function show($category){

   $products = Product::where('category_id',$category)->paginate(8);
   return view('products.index',compact('products'));

}

}