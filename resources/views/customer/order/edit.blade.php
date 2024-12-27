@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Edit Order Status</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.order.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.order.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Order Status *</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="declined" {{ $order->status == 'declined' ? 'selected' : '' }}>Declined</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
