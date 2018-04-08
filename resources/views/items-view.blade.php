@extends('main-layout') 
@section('title', 'Current Items') 
@section('content')
<table class="table">
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Price</th>
        <th>Image URL</th>
        <th>Description</th>
        <th>Release Date</th>
        <th>Cetegory</th>
        <th>Actions</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->img_url}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->release_date}}</td>
        <td>{{$item->category_id}}</td>
        <td>
            <a href="/items/{{$item->id}}/edit">Edit</a>
            <a href="/items/{{$item->id}}/delete">delete</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="/items/new">Add a new item</a>
@endsection