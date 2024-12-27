<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart data from session
        $cart = session('cart', []);
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('frontend.product.checkout', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Your cart is empty.');
        }

        // Create Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'shipping_address' => $request->shipping_address,
            'total_amount' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
        ]);

        // Create Order Items
        foreach ($cart as $productId => $details) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Clear Cart
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}

