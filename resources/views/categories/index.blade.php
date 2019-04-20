@extends('master')

@section('content')
<div align="center">
<h1>categories list</h1>
<a href="{{url('categories/create')}}">Add</a>
</br>
    <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th sccope="col">Status</th>
      <th scope="col">Actions</th>
      <th scope="col">Items Available</th>
    </tr>
  </thead>
  <tbody >
    
       
    @foreach($categories as $category)
    <td  scope="row"><a href="{{url('/categories/'.$category->id)}}" style="background-color:black; color:white; border-radius:20%">{{$category['name']}}</a></td>
    <td>@if($category->status == 1)
        <button class="btn btn-success">Active</button>
        @else
        <button class="btn btn-danger">Disabled</button>
        @endif
    
    </td>
    
    <td><button class="btn btn-info"><a href="{{url('categories/'.$category['id'].'/edit')}}"   style="color:black">Edit</button></a>
    <form action="{{url('categories/'.$category['id'])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <input type="submit" class="btn btn-danger" value="delete">
    </td>
    <td>{{$category->products_count}}</td>
    </tr>
    </form>
@endforeach
   

    </table>
    </div>
    <div class="row">
<div class="col-12 d-flex justify-content-center pt-5">
{{$categories->links()}}
</div>
</div>
    @endsection
