@extends('layout.layout')
@section('title', 'Edit Product')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Product</h2>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
        @csrf
        @method('PUT')
        
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Quantity -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="Enter quantity" min="0">
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if ($product->image)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                </div>
                <small class="form-text text-muted">Leave blank to keep the current image.</small>
            @endif
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter price" min="0" step="0.01">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>

@endsection
