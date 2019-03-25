<div align="center">
<h2 edit users here</h2>
<form action="{{url('users/'.$user->id)}}" method="POST">@csrf
<input type="hidden" name="_method" value="put">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{$user->name}}">
    <br>
    <label for="password">password:</label>
    <input type="text" name="password" value="{{isset($user)? $user->password : ''}}" >
    </br>
    <label for="email">email:</label>
    <input type="text" name="email" value="<?php echo $user['email']; ?>">
    <br>
    <label for="username">username:</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>">
    <br>
 
    <input type="submit" name="submit">
</form>
</div>
