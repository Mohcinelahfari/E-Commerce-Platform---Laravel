@extends('Layout.Layout')
@section('title','Categories')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Update</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
