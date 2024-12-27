<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function order()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('customer.order.index',compact('orders'));
    }
}
