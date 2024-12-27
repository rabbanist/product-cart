<!DOCTYPE html>

<html>

<head>

    <title>Laravel Add To Cart Function - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 main-section d-flex justify-content-end align-items-center">
                <div class="dropdown me-2">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                        <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </button>
    
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </div>
    
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
    
                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                            </div>
                        </div>
    
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ $details['image'] }}" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['name'] }}</p>
                                        <span class="price text-info"> ${{ $details['price'] }}</span> 
                                        <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
    
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('product.cart') }}" class="btn btn-primary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
    
               
                @guest
                    <a href="{{ route('login') }}" class="btn btn-secondary ms-2 mr-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary ms-2">Register</a>
                @endguest

                @auth
                <!-- Show Dashboard button with dynamic route based on user role -->
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('customer.dashboard') }}" class="btn btn-success ms-2">
                    {{ auth()->user()->role === 'admin' ? 'Admin Dashboard' : 'Customer Dashboard' }}
                </a>
            @endauth
            </div>
        </div>
    </div>
    
    <br />

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
