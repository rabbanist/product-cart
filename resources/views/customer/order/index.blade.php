@extends('customer.layouts.app')

@include('customer.components.navbar')

@include('customer.components.sidebar')

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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
