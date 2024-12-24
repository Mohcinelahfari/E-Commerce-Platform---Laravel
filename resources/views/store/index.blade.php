@extends('Layout.Layout')
@section('title', 'Products')
@section('content')
<div class="container mt-5 d-flex">
    <!-- Sidebar -->
    <aside class="sidebar p-4 bg-light border rounded" style="width: 25%; margin-right: 20px;">
        <form method="GET" class="filter-form">
            <h4 class="mb-4">Filter Products</h4>
            <div class="form-group mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" id="name" name="name" value=" {{Request::input('name')}}" class="form-control" placeholder="Enter name">
            </div>
            <h4 class="mb-4">Categories</h4>

            <div class="form-check mb-3">
                @foreach ($categories as $category)
                <div>
                    <label for="categories" class="form-check-label">
                        {{$category->name}}
                    </label>
                    <input @checked(in_array($category->id, (array) Request::input('categories', []))) type="checkbox" id="categories[]" value="{{$category->id}}" name="categories[]" class="form-check-input" placeholder="Enter categories">
                </div>
                @endforeach
            </div>
            <div class="form-group mb-3">
                <label for="min_price" class="form-label"> min price</label>
                <input type="number" id="min_price" name="min_price" class="form-control" placeholder="Enter max min_price">
            </div>
            <div class="form-group mb-3">
                <label for="max_price" class="form-label"> max price</label>
                <input type="number" id="max_price" name="max_price" class="form-control" placeholder="Enter max max_price">
            </div>
            <div class="form-group mb-3">
                <label for="rating" class="form-label">Min Rating</label>
                <input type="number" id="rating" name="rating" class="form-control" placeholder="Enter minimum rating">
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            <a href="{{ route('homepage') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </aside>

    <!-- Main Content -->
    <div class="content" style="width: 75%;">
        <h1>Last Product</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" style="max-width: 100%;">
                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
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
                            <p class="card-text"><small class="text-primary">Category: {{ $product->category?->name }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
