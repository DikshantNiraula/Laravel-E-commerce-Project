@extends('master')
@section('content')

<body>
  <div align="center">

    <div class="producthead">
      <h1 class="pt-5">सामानहरु <i class="far fa-smile"></i> </h1>
      <a href="{{url('products/create')}}" style="background-color:#FFFFE0 "><i class="fas fa-plus-circle"></i>Add</a>
    </div>
    </br>
    <style>
      .producthead {
        background-image: linear-gradient(#fff, #b3ccff);
        margin-top: 2px;

      }
    </style>

  </div>

  <section>
    <nav>
      @if(Auth::user())
      <h4>Hello,<br>{{Auth::user()->name}}.</h4>
      @endif
      <br><a href="https://www.facebook.com/unique.dikshant"><i class="fab fa-facebook-f"></i></a> <a href="https://www.instagram.com/dikshantniraula/"> <i class="fab fa-instagram"></i></a>
      <a href="https://github.com/DikshantNiraula"><i class="fab fa-stack-overflow"></i> </a>
      <a href="https://gmail.com"> <i class="fas fa-envelope"></i></a>
      <br><br>
    </nav>
    <article>
      <div class="row mb-5">
        @forelse($products as $product)
        <a href="{{route('products.show',$product->id)}}" style="color:black">
          <div class="col-md-4 pt-4">
            <div class="card" style="width: 18 em ; height:470px;">
              <div class="card-body">
                <div>
                  <h4>{{$product->name}}</h4>
                  <h5>Quantity Available: {{$product->quantity}}</h5>
                </div>
                <p>{{optional($product->category)->name}}</p>
                <p><img src="{{asset('storage/images/products/'.$product->image)}}" height="110" align="center"></p>


                <p class="card-text"><b><i>{{$product->description}}</b></i></p>
                <div style="background-color:gray" class="baseline-alignment">
                  <h4 class="text-left">Rs.<div style="color:yellow">{{$product->price}} Only</h4>
                </div>
                <div class="content">
                  @if(Auth::user())
                  <p>@if(\Auth::user()->id == $product->user_id)
                    <div style="background-color:skyblue" class="right-float"><a href="{{url('products/'.$product['id'].'/edit')}}"><i class="fas fa-edit"></i> Edit</a></div>
                    <form action="{{url('products/'.$product['id'])}}" method="post" class=" text-left">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i><input type="submit" value="Delete"></button>
                    </form>
                  </p>
                  @endif
                  @endif

                </div>


        </a>

      </div>
      </div>
      </div>
      @empty
      <h3>Sorry, No Products available for this Category..we'll try add soon...</h3>
      @endforelse
      </div>
    </article>
  </section>
  <div class="row">
    <div class="col-12 d-flex justify-content-center pt-5">
      {!! $products->links() !!}
    </div>
  </div>

  <style>
    section {
      display: -webkit-flex;
      display: flex;

    }

    /* Style the navigation menu */
    nav {
      -webkit-flex: 1;
      -ms-flex: 1;
      flex: 1;
      background-color: #E0FFFF;
      padding: 20px;
      margin: 10px;
    }

    /* Style the list inside the menu */
    nav ul {
      list-style-type: none;
      padding: 0;
    }

    /* Style the content */
    article {
      -webkit-flex: 3;
      -ms-flex: 10;
      flex: 7;
      background-color: #FFF8DC;
      padding: 10px;
    }
  </style>


  @endsection