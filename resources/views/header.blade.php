<nav class="navbar navbar-expand-lg navbar-dark bg-dark col-md-12 ">
  <a class="navbar-brand" href="#"><i class="fas fa-shipping-fast"></i> मेरो सपिङ<br />
    <div class="pl-4">My Shopping</div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse d-flex justify-content-end " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link px-5" href="{{url('myOrders')}}"><i class="fas fa-shopping-cart"></i> My Orders</a>
      </li>
      <li class="nav-item">
        @if (Route::has('login'))
        <div class="top-right links">
          @auth
          <!-- <div> <a class="nav-link" href="{{ url('/home') }}">Home</a></div> -->
          <div> <a class="nav-link px-5" href="{{ url('/products') }}">Products</a></div>

          <div class="float-right">

      <li class="nav-item">
        <div> <a class="nav-link px-5" href="{{ url('/categories') }}">Category</a></div>
      </li>
      <li class="nav-item">
        <div> <a class="nav-link px-5" href="{{url('orders')}}">Orders</a></div>
      </li>
      <li class="nav-item">
        <div> <a class="nav-link px-5" href="{{ url('/brands') }}">Brands</a></div>
      </li>

      <li>
        <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      <li class="nav-item dropdown text-left">
        <a class="nav-link dropdown-toggle px-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
          {{Auth::user()->name}}
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>

          
        </div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </li>

  </div>



  @else
  <li class="nav-item">
    <a class="nav-link px-5" href="{{ route('login') }}">Login</a></li>
  <li class="nav-item">
    @if (Route::has('register'))
    <a class="nav-link px-5" href="{{ route('register') }}">Register</a></li>

  @endif
  </div>
  @endauth
  </div>
  @endif
  </li>





  </ul>
  </div>
  <!--  <div class="d-flex justify-content-end">
  <div class="mr-auto p-2">Flex item</div>
  <div class="p-2">Flex item</div>
  <div class="p-2">Flex item</div>
</div>-->

</nav>






<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Nunito);

  /* Style the list */
  ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
  }

  /* Display list items side by side */
  ul.breadcrumb li {
    display: inline;
    font-size: 18px;
  }

  /* Add a slash symbol (/) before/behind each list item */
  ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
  }

  /* Add a color to all links inside the list */
  ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
  }

  /* Add a color on mouse-over */
  ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
  }
</style>

<div class="py-4">
  @if(session()->exists('message'))
  {{
session('message')
}}
  @endif
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>  
      @foreach($errors->all() as $error)
      <li>{{ $error   }}</li>
      @endforeach
    </ul>
  </div>
  @endif

</div>