<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_orders['total_orders'] = Order::where('user_id', Auth::id())->count();

        $order_pending['order_pending'] = Order::where('user_id', Auth::id())
            ->where('status','0')->count();

        $order_confirmed['order_confirmed'] = Order::where('user_id', Auth::id())
            ->where('status','1')->count();

        $order_rejected['order_rejected'] = Order::where('user_id', Auth::id())
            ->where('status','2')->count();

        return view('dashboard.customer.index')
            ->with($total_orders)
            ->with($order_pending)
            ->with($order_confirmed)
            ->with($order_rejected);
    }
}
