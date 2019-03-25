<div align="center">
<h2 edit products here</h2>
<form action="{{url('products/'.$product->id)}}" method="POST">@csrf
<input type="hidden" name="_method" value="put">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{$product->name}}">
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" value="{{isset($product)? $product->description : ''}}" >
    </br>
    <label for="price">price:</label>
    <input type="text" name="price" value="<?php echo $product['price']; ?>">
    <br>
    <label for="category-id">Category_id:</label>
    <input type="text" name="category_id" value="<?php echo $product['category_id']; ?>">
    <br>
 
    <input type="submit" name="submit">
</form>
</div>
