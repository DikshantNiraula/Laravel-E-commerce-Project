<div align="center">
<h1>User list</h1>
<a href="{{url('users/create')}}">Add</a>

<table border="1">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $user) {?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['password']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
        <a href="{{url('users/'.$user['id'].'/edit')}}">Edit</a>
        <form action="{{url('users/'.$user['id'])}}" method="post">@csrf
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="delete" >
        </form>
        </td>
    </tr>
    <?php }?>
</table>        