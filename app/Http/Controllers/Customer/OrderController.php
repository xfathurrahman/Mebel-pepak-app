<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.customer.order.index');
    }

    public function myOrder()
    {
        $orders['order'] = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('dashboard.customer.order.index')->with($orders);
    }

    public function detailOrder($id)
    {
        $orders['orders'] = Order::with('orderitem')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $cust_orders['cust_orders'] = Order::with('orderitem','paymentimage')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->get();

        return view('dashboard.customer.order.detail')->with($orders)->with($cust_orders);
    }
}
