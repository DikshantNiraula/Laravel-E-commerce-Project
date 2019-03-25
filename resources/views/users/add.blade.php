<div align="center">
<h2>we can add users here</h2>

<form action="{{url('users')}}" method="POST">@csrf
    <label for="name">Name:</label>
    <input type="text" name="name" >
    <br>
    <label for="password">Password:</label>
    <input type="text" name="password" >
    </br>
    <label for="username">Username:</label>
    <input type="text" name="username" >
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" >
    <br>
    <input type="submit" name="submit">
</form>
</div>