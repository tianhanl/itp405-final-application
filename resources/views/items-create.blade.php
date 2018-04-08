@extends('main-layout') 
@section('title', 'Create Items') 
@section('content')
<h1>
    Add an item
</h1>
@if ($errors->isNotEmpty())
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $message) {{$message}} @endforeach
</div>
@endif
<form action="/items" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="itemname">Item Name</label>
        <input type="text" value="{{old('itemname')}}" id="itemname" name="itemname" class="form-control">
        <label for="price">Price</label>
        <input type="number" value="{{old('price')}}" id="price" name="price" class="form-control">
        <label for="imgurl">Image URL</label>
        <input type="text" value="{{old('imgurl')}}" id="imgurl" name="imgurl" class="form-control">
        <label for="description">Description</label>
        <input type="text" value="{{old('description')}}" id="description" name="description" class="form-control">
        <label for="releasedate">Release Date</label>
        <input type="date" value="{{old('releasedate')}}" id="releasedate" name="releasedate" class="form-control">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
@endsection