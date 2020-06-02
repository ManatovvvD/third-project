@extends('layouts.app')

@section('content')
@include('includes.errors')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
        <div class="card card-default">
  <div class="card-header">
      Products
  </div>
<table class="table ">
    <thead>
        <th>
            Name
        </th>
        <th>
            Price
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
      @if($products -> count() > 0)
        @foreach ($products as $product)
        <tr>
          <td>{{$product->name}}</td>
          <td>{{$product->price}}</td>
          <td><a class="btn btn-xs btn-info " href="{{route('products.edit',['id' => $product->id])}}">Edit</a></td>
          <td>
          <form action="{{route('products.destroy',['id' => $product->id])}}" method="POST">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <button class="btn btn-xs btn-danger" href="">Delete</button>       
          </form>
        </td>
        </tr>
        @endforeach
        @else
        <tr>
          <th colspan="5" class="text-center">No published products</th>
        </tr>
        @endif
    </tbody>
</table>
           </div>
        </div>
    </div>
</div>

@stop
