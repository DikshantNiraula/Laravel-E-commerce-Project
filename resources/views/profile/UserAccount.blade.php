@extends('master')
@section('content')
  <div class="container py-3">
      <div class="row well">
          <div class="col-md-10">
              <div class="panel">
                  <img src="{{asset('storage/images/users/'.Auth::user()->image)}}">
                      <div class="name"><h4>{{\Auth::user()->name}}</h4>
                     <small>Joined:{{$user->created_at->diffForHumans()}}</small>

                      </div>
                        <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="{{'profile/edit'}}" class="btn btn-xs btn-primary pull-right" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span>Edit Profile</a></li>
                        </ul>
              </div>
          </div>
       </div>
  </div>   <br><br><br>       
    <h4>Products Added By Me</h4>
  <div class="row pb-5">
    @forelse($products as $product)
        <a href="{{route('products.show',$product->id)}}" style="color:black">
          <div class="col-md-4 py-5">
            <div class="card" style="width: 18 em ; height:450px;">
              <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p>{{optional($product->category)->name}}</p>   
                <p><img src="{{asset('storage/images/products/'.$product->image)}}" height="110"></p>  
                <p class="card-text"><b><i>{{$product->description}}</b></i></p>
                <div style="background-color:gray"><h4>Rs.<div style="color:yellow">{{$product->price}} Only</h4></div>

                <p class="baseline-alignment">
                @if(\Auth::user()->id == $product->user_id)
                    <div style="background-color:skyblue"><a href="{{url('products/'.$product['id'].'/edit')}}"><i class="fas fa-edit"></i> Edit</a></div>
                    <form action="{{url('products/'.$product['id'])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i><input type="submit" value="Delete"></button>
                    </form>
                  @endif
                </p>
        </a>
          </div>  
        </div>
    </div>
      @empty
          <h3>Sorry,you haven't added any products...<br><br>Hope you'll add products soon.....</h3>
      @endforelse
  </div>  

    </div>
  </div>
</div>
@endsection