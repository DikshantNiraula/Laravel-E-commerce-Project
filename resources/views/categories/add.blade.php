@extends('master')

@section('content')


<div align="center">
    <h2>We can give Categories here </h2>

    <form action="{{url('categories')}}" method="POST">@csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value={{old('name') ? old('name') : ''}}>
        <br><label for="status">status:</label>
        <input type="hidden" name="status" value=0>
        <input type="checkbox" name="status" checked="checked" value=1 {{old('status') == 1?'checked':''}}>Active
        </br>

        <input type="submit" name="submit">
    </form>
</div>
@endsection