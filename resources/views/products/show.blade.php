@extends('master')
@section('content')

<h3 align="center" class="pb-4">Product Detail.</h3>
<div class="mx-5">

  @if(Auth::user() && Auth::user()->id == $product->user_id)
  <h4 style="color:green" class="text-left">Product Uploaded by me</h4>
  @else
  <h4 style="color:green" class="text-left">Product was Uploaded By:{{optional($product->user)->name}}</h4>
  @endif


  <div class="card text-center pb-5">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <p> @if(Auth::user() && Auth::user()->id == $product->user_id)
          <li class="nav-item"><a href="{{url('products/'.$product['id'].'/edit')}}" class="nav-link active"><i class="fas fa-edit"></i> Edit</a></li>

          <form action="{{url('products/'.$product['id'])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <li class="nav-link" style="color:red"><i class="fas fa-trash-alt"></i><input type="submit" value="Delete"></li>
          </form>
          <a class="nav-link disabled" href="#">Buy and Pay</a>
        </p>
        @else

        <li><a class="nav-link" href="#">Buy and Pay</a></li>
        <a href="{{route('product.order',['product'=>$product->id])}}" class="btn btn-success float-right pb-0 mb-2" align="center"><i class="fas fa-cart-plus"></i>Order Now</a>

        @endif
      </ul>
    </div>

    <div class="card-title" value=""><u>
        <h3>{{$product['name']}}</h3>
      </u></div><br />

    <p>{{optional($product->category)->name}}</p>
    <!-- optionalis used to eliminate errors when category_id of products donot match with id of category ..so it donot display category of products which donot have its category-->
    <p class="card-text"><b><i>{{$product['description']}}</i></b></p>
    <p><img src="{{asset('storage/images/products/'.$product->image)}}" height="250" id="imgZoom">

    </p>
    <h6>{{$product->quantity}}
      <h6>
        <p>
          <div class="card-footer">
            <div class="text-left" style="color:gray"><b>Added On:</b>{{date('F d,Y',strtotime($product['created_at']))}} at {{date('d:ia',strtotime($product['created_at']))}}</div>

            <div class="text-right">
              <h3 style="color:darkblue"><b>रू.<u style="color:red">{{$product['price']}}</u>मात्र</b></h3>
            </div>
          </div>
        </p>
        <a href="{{route('products.index')}}" class="btn btn-info float-right pb-0 mb-2" align="center"><b style="color:black">Back to home</b></a>
  </div>
</div>
</a>
</div>
</div>

<style>
  #imgZoom {
    height: 300;
  }

  img#imgZoom:hover {
    position: relative;
    -webkit-transform: scale(1.5);
    -ms-transform: scale(1.5);
    -o-transform: scale(1.5);
    transform: scale(1.3);
    z-index: 1000;
  }

  .user_name {
    font-size: 14px;
    font-weight: bold;
  }

  .comments-list .media {
    border-bottom: 1px dotted #ccc;
  }
</style>
<br />
<br />
<hr />

<form style="width:50%" class="pl-5 pb-5" action="{{url('comments/{product_id}')}}" method="POST">@csrf
  <input type="hidden" name="_method" value="put">

  <div class="form-group">
    <label for="comment" style="background-color:#FFFACD">Please feel free to comment if you have any question about the product.</label>
    :</label>
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <textarea style="resize: none;" class="form-control" name="comment" rows="5" id="comment" placeholder="Enter your Comment here..." value={{old('comment') ? old('comment') : ''}}></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Comment</button>
</form>

<br />

<div class="container">
  <div class="row">
    <div class="panel-group">
      <div class="panel panel-success">
        <div class="panel-heading py-2">
          <h3>Comments</h3>
        </div>
        <div class="comments-list">
          <div class="media">
            <!-- <p class="pull-left"><small>5 days ago</small></p> -->
            <!-- <a class="media-left" href="#"> -->
            <!-- <img src="http://lorempixel.com/40/40/people/1/"> -->
            <!-- </a> -->

            <div class="media-body">
              @foreach($comments as $comment)

              <div class="panel-body">

                <h4 class="media-heading user_name">
                  {{$comment->user->name}}<br>
                  <small>{{$comment->created_at->diffForHumans()}}</small>


                </h4>
                {{$comment->comment}}
              </div>

              <p><small><a href="">Like</a> - <a href="">Share</a>-

                  <p><small> @if(\Auth::user()->id == $comment->user_id)
                      <a href="#">
                        <form action="{{url('comments/'.$comment['id'])}}" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="delete">
                          <li class="nav-link" style="color:red">
                            <input type="submit" value="remove"></li>
                        </form>
                      </a>
                      @endif
                    </small></p>
                  @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




@endsection