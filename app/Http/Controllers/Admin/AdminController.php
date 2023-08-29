<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $pending = Order::where('status','0')->count();
        $confirm = Order::where('status','1')->count();
        $reject = Order::where('status','2')->count();
        $order = Order::all()->count();
        $balance = Order::where('status','1')->sum('total_price');

        $ttcustomer = User::where('level','0')->count();
        $ttadmin = User::where('level','1')->count();
        $ttproduct = Product::all()->count();

        return view('dashboard.admin.index',
            compact('pending', 'confirm',
                'reject',
                'order',
                'balance',
                'ttcustomer',
                'ttadmin',
                'ttproduct',
            ));
    }

}
