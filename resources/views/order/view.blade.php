@extends('master')
@section('content')

@foreach($orders as $order)
<div class="card text-center pb-5">
    <div class="card-header">

    <div class="card-title" value=""><u><h3>{{$order->product['name']}}</h3></u></div><br/>
    
    <p>Added by{{optional($order->user)->name}}</p>   
    <!-- optionalis used to eliminate errors when category_id of products donot match with id of category ..so it donot display category of products which donot have its category-->
    <p class="card-text"><b><i>{{$order->product['description']}}</i></b></p>
    <p><img src="{{asset('storage/images/products/'.$order->product->image)}}" height="250" id="imgZoom">

    </p>  
    <h6>Quantity Available:{{$order->product->quantity}}<h6>
    <p>
    <div class="card-footer"><div class="text-left" style="color:gray"><b>Added On:</b>{{date('F d,Y',strtotime($order['created_at']))}} at {{date('d:ia',strtotime($order['created_at']))}}</div>

    <div class="text-right"><h3  style="color:darkblue"><b>रू.<u style="color:red">{{$order->product['price']}}</u>मात्र</b></h3></div></div>
    </p>
  </div>
</div>
</a>
    </div>
</div>
@endforeach

@endsection