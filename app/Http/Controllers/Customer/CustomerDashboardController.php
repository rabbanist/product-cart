<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('customer.order.index', compact('orders'));
    }
}
