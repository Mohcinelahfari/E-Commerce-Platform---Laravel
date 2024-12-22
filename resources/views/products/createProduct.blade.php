@extends('Layout.layout')
@section('title','create product')
    

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
      <!-- CSRF Token -->
        @csrf
      <!-- Name -->
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Enter item name">
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter item description">{{ old('name') }}</textarea>
      </div>

      <!-- Quantity -->
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter quantity" min="0">
      </div>

      <!-- Image -->
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
      </div>

      <!-- Price -->
      <div class="mb-3">
        <label for="price" class="form-label">Price ($)</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price" min="0" step="0.01">
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
