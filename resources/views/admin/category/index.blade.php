@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-8 col-12">
             <a class="btn btn-primary mb-3 justify-items-end" href="{{ route('admin.product-category.create') }}">Add Category</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.product-category.edit', $category->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('admin.product-category.delete', $category->id) }}" method="POST" style="display: inline-block">
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
