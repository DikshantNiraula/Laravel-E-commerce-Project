@extends('master')
@section('content')


<form style="width:50%" action="{{url('/products/{product}/ordered')}}" method="POST">@csrf
<input type="hidden" name="_method" value="put">

   <div class="form-group">
    <label for="address">Your Address</label>
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="text" name="address" class="form-control" aria-describedby="emailHelp" id="addressHelp" placeholder="Enter your delivery Address" value={{old('address') ? old('address') : ''}}>
    <small id="addressHelp" class="form-text text-muted">We'll never share your Address with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="quantity">Quantity you want to Buy</label>
    <input type="number"name="quantity" value=1 class="form-control" min="1" step="1" placeholder="Quantity" value={{old('quantity') ? old('quantity') : ''}}>
  </div>
  <div class="form-group">
    <label for="phonenumber">Your Phone Number</label>
    <input type="text" name="phonenumber" class="form-control" placeholder="98xxxxxxxx" value={{old('phonenumber') ? old('phonenumber') : ''}}>
  </div>
  

  
  <button type="submit" name="submit" class="btn btn-primary">Order</button>
</form>


@endsection