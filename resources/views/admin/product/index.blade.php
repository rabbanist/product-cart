@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product Create</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-8 col-12">
                    <a class="btn btn-primary mb-3 justify-items-end" href="{{ route('admin.product.create') }}">Add Category</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('images/'.$product->image) }}" alt="" style="width: 50px; height: 50px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
