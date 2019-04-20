@extends('master')

@section('content')
<div align="center">
<h2>edit users here</h2>
<form action="{{url('users/'.$user->id)}}" method="POST" enctype="multipart/form-data">@csrf
<input type="hidden" name="_method" value="put">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{$user->name}}">
    <br>
    <label for="password">password:</label>
    <input type="text" name="password" >
    <br>
    <label for="image">Upload User Image:</label>
    <input type="file" name="image">
    <br/>
 
    <input type="submit" name="submit">
</form>
</div>
@endsection