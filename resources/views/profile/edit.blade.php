@extends('master')

@section('content')
<div align="center">
<h2>edit users here</h2>

<div class="container my-4" style="width:350px">
<form action="{{url('profile/update')}}" method="POST" enctype="multipart/form-data">@csrf
<input type="hidden" name="_method" value="put" class="col-sm-6">

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name"  class="form-control" value="{{$user->name}}">
    </div>
    <div class="form-group">
          <label for="password">Current Password</label>
          <input type="text" name="old_password" class="form-control" id="old_password">
    </div>
    <div class="form-group">
          <label for="password">Password</label>
          <input type="text" name="password" class="form-control" id="password">
    </div>
    <div class="form-group">
          <label for="password">New Password</label>
          <input type="text" name="password_confirmation" class="form-control" id="password_confirmation">
    </div>
    <div class="form-group">
    <label for="image">Upload User Image:</label>
    <input type="file" name="image" class="form-control">
 </div>
    <input type="submit" name="submit">
</form>
</div>
</div>
@endsection