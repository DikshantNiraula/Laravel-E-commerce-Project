@extends('master')

@section('content')
<div align="center">
<h2>edit Brands here</h2>
<form action="{{url('brands/'.$brand->id)}}" method="POST">@csrf
<input type="hidden" name="_method" value="put">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{old('name') ? old('name') : $brand->name}}">
    <br>
    <label for="status">status:</label>
    <input type="text" name="status" value="{{old('status') ? old('status') : $brand->status}}">
    </br>
   
    <input type="submit" name="submit">
</form>
</div>
@endsection
