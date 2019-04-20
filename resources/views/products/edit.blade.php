@extends('master')

@section('content')
<div align="center">
<h2>edit products here</h2>
<form action="{{url('products/'.$product->id)}}" method="POST">@csrf
<input type="hidden" name="_method" value="put">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{old('name') ? old('name') : $product->name}}">
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" value="{{old('description') ? old('description') : $product->description}}">
    </br>
    <label for="price">price:</label>
    <input type="text" name="price"  value="{{old('price') ? old('price') : $product->price}}">
    <br>
    <label for="quantity">Quantity Available</label>
    <input type="number" value="1" name="quantity">
    <br/>
    <label for="category_id">category_id</label>
    <!-- <input type="text" name="category_id" >-->

    Category<select name="category_id">
    @foreach($categories as $category)
        @if($category->id == $product->category_id)
            <option value="{{$category->id}}" selected="selected">{{$category->name}} </option>
        @else
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endif
    @endforeach
    </select><br/>
    Brand<select name="brand_id">
    @foreach($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach
    </select>
 
    <input type="submit" name="submit">
</form>
</div>
@endsection
