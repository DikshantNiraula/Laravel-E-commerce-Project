<div align="center">
<h2>we can add products here</h2>

<form action="{{url('products')}}" method="POST">@csrf
    <label for="name">Name:</label>
    <input type="text" name="name" >
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" >
    </br>
    <label for="price">price:</label>
    <input type="text" name="price" >
    <br>
    <label for="category_id">category_id</label>
    <input type="text" name="category_id" >
    <br>
    <input type="submit" name="submit">
</form>
</div>