@extends('master')
@section('content')



<table border=1>
<th>Id</th>
<th>Ordered by</th>
<th>Phone No.</th>
<th>Address</th>
<th>Ordered Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Total Price</th>
<th>Ordered Date</th>
<th>Action(click 'delivered' button to <br>delete delivered items)</th>
</tr>
@foreach($orders as $order)

<tr>
<td>{{$order->id}}</td>
<td>{{$order->user->name}}</td>
<td>{{$order->phonenumber}}</td>
<td>{{$order->address}}</td>
<td>{{optional($order->product)->name}}</td>
<td>{{$order->quantity}}</td>
<td>{{optional($order->product)->price}}</td>
<td>{{optional($order->product)->price*$order->quantity}}</td>
<td>{{$order->created_at->diffForHumans()}}</td>
<td class="p-1"><form action="{{url('orders/'.$order['id'])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <div style="color:red; list-type:none" class="text-right"><i class="fas fa-trash-alt"></i><input type="submit" value="Delivered"></div>
    </form> 
    <div><div class="btn btn-info"><a href="{{url('order/views')}}" style="color:black">View</a></div></td>
</tr>
@endforeach

</table>

@endsection