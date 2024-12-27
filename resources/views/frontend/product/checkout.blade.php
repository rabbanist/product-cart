@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Checkout</h2>
        <form action="{{ route('checkout.placeOrder') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="shipping_address">Shipping Address</label>
                <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address') }}</textarea>
            </div>

            <h4>Order Summary</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0 @endphp
                @foreach($cart as $id => $details)
                    @php $subtotal = $details['price'] * $details['quantity'] @endphp
                    @php $total += $subtotal @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>${{ $subtotal }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h4>Total: ${{ $total }}</h4>

            <button type="submit" class="btn btn-success">Place Order</button>
            <a href="{{ url('/') }}" class="btn btn-warning">Continue Shopping</a>
        </form>
    </div>
@endsection
