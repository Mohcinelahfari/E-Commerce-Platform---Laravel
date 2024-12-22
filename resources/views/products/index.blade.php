@extends('Layout.Layout')
@section('title','products')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Items List</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Quantity</th>
          <th scope="col">Image</th>
          <th scope="col">Price ($)</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->quantity}}</td>
            <td><img src="{{ asset('storage/'.$product->image) }}" alt="Item Image" class="img-thumbnail" width="50"></td>
            <td>{{$product->price}}</td>
            <td>
            <div class="d-flex">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Modifie</a>
                <form action="{{ route('products.destroy',$product) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection