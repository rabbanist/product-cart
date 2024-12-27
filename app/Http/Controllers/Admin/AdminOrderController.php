<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

//    Edit order
    public function orderEdit(string $id)
    {
        $order = Order::findOrfail($id);
        if (!$order) {
            return redirect()->route('admin.order.index');
        }
        return view('admin.order.edit', compact('order'));
    }
//
//    //Update order status
    public function updateOrderStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $order = Order::findOrfail($id);
        if (!$order) {
            return redirect()->route('admin.order.index');
        }
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.order.index');
    }

    //Delete order
    public function orderDestroy(string $id)
    {
        $order = Order::findOrfail($id);
        if (!$order) {
            return redirect()->route('admin.order.index');
        }
        $order->delete();
        return redirect()->route('admin.order.index');
    }
}
