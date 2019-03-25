<div align="center">
<h1>Product list</h1>
<a href="{{url('products/create')}}">Add</a>

<table border="1">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    <?php foreach($products as $product) {?>
    </tr>
    <td><?php echo $product['id']; ?>
    </td>
    <td><?php echo $product['name']; ?></td>
    <td><?php echo $product['category_id']; ?></td>
    <td><?php echo $product['price']; ?></td>
    <td><a href="{{url('products/'.$product['id'].'/edit')}}">Edit</a>

    <form action="{{url('products/'.$product['id'])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <input type="submit" value="delete">
    </form>


    </tr>
    <?php } ?>
    </table>
    </div>
