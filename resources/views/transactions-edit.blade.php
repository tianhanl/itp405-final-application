@extends('main-layout') 
@section('title', 'Edit a Transaction') 
@section('content')
<h1>Edit a Transaction</h1>
@if ($errors->isNotEmpty())
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $message) {{$message}} @endforeach
</div>
@endif
<form action="/transactions/{{$transaction->id}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="{{$transaction->quantity}}">
        <label for="total">Total</label>
        <input type="number" name="total" id="total" value="{{$transaction->total}}">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
</form>
@endsection