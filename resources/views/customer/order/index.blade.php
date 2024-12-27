@extends('admin.layouts.app')

@include('admin.components.navbar')

@include('admin.components.sidebar')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Show Order</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-8 col-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Shopping Address</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('admin.order.delete', $order->id) }}" method="POST" style="display: inline-block">
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
