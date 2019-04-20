@extends('master')

@section('content')

<div align="center">
<h2>we can add products here</h2>

<form action="{{url('products')}}" method="POST" enctype="multipart/form-data">@csrf
    <label for="name">Name:</label>
    <input type="text" name="name" value={{old('name') ? old('name') : ''}}>
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" value={{old('description') ? old('description') : ''}}>
    </br>
    <label for="price">price:</label>
    <input type="text" name="price" value={{old('price') ? old('price') : ''}}>
    <br>
    <label for="quantity">Quantity Available</label>
    <input type="number" name="quantity" value="1" min="1" step="1">
    <br/>
    Category<select name="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select><br/>
    Brand<select name="brand_id">
    @foreach($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach
    </select>
    <br>
    <label for="image">Upload Product Image:</label>
    <input type="file" name="image">
    <input type="submit" name="submit">
</form>
</div>
@endsection