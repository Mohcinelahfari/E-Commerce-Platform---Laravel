@extends('Layout.Layout')
@section('title','Categories')
@section('content')

<div class="container mt-5">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="text-center">Items List</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($categories as $categorie)
        <tr>
            <td>{{$categorie->id}}</td>
            <td>{{$categorie->name}}</td>
            <td>
            <div class="d-flex justify-content-center mx-2">
                <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary  mx-2">Modifie</a>
                <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info  mx-2">View</a>
                <form action="{{ route('categories.destroy',$categorie) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ">Supprimer</button>
                </form>
            </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection