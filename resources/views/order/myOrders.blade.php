@extends('master')
@section('content')

<h4>Products Ordered By You</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity Ordered</th>
      <th scope="col">Cost Price</th>
      <th scope="col">Total Price</th>
      <th scope="col">Ordered Address</th>
      <th scope="col">Ordered Date</th>

    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order)
    <tr>
      <th scope="row">{{optional($order->product)->name}}</th>
      <td>{{$order->quantity}}</td>
      <td>{{optional($order->product)->price}}</td>
      <td>{{optional($order->product)->price * $order->quantity}}</td>
      <td>{{$order->address}}</td>
      <td>{{$order->created_at->diffForHumans()}}</td>

    </tr>
   @endforeach
  </tbody>
</table>


@endsection