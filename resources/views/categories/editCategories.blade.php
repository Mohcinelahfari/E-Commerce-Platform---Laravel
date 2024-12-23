@extends('Layout.Layout')
@section('title','Update categories')
@section('content')


<div class="container mt-5">
    <h1>Update Category</h1>
    <form action="{{ route('categories.update',$category) }}" method="POST" class="d-flex align-items-center mb-4">
        @csrf
        @method('put')
        <div class="mb-3 flex-grow-1 me-2">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control w-100" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
</div>
@endsection
