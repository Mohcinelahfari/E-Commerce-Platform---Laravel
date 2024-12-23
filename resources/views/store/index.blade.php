@extends('Layout.Layout')
@section('title', 'Products')
@section('content')
<div class="container mt-5">
    <h1>Last Product</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4"> <!-- Adjust 'col-md-4' as needed for column size -->
                <div class="card" style="max-width: 100%;"> <!-- Full width for a cleaner layout -->
                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-muted">Quantity: {{ $product->quantity }}</small></p>
                        <p class="card-text"><small class="text-muted">Price: ${{ $product->price }}</small></p>
                        <p class="card-text">
                            <small class="text-muted">
                                Created: {{ $product->created_at->format('F j, Y \a\t g:i A') }} ({{ $product->created_at->diffForHumans() }})
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
