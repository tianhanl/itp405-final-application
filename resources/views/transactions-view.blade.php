@extends('main-layout') 
@section('title', 'Current Transactions') 
@section('content')
<table class="table">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Item</th>
        <th>Date</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>
    @foreach($transactions as $transaction)
    <tr>
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->user_id}}</td>
        <td>{{$transaction->item_id}}</td>
        <td>{{$transaction->date}}</td>
        <td>{{$transaction->quantity}}</td>
        <td>{{$transaction->total}}</td>
        <td>
            <a href="/transactions/{{$transaction->id}}/edit">Edit</a>
            <a href="/transactions/{{$transaction->id}}/delete">delete</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="/transactions/new">Add a new transaction</a>
@endsection