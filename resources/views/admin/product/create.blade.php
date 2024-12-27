@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Create Product</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label class="form-label">Product Image *</label>
                                              <div>
                                                  <input type="file" name="image">
                                              </div>
                                          </div>
                                        </div>
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="form-label">Product Name *</label>
                                                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                              </div>
                                          </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Product Category *</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Price *</label>
                                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label ">Description *</label>
                                        <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
