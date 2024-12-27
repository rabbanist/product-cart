@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category Edit</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <form action="{{ route('admin.product-category.update', $category->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-secondary" href="{{ route('admin.product-category.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
