<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders['orders'] = Order::where('status','0')->get();

        return view('dashboard.admin.transaction.index')->with($orders);
    }

    public function detailTrans($id)
    {
        $orders['orders'] = Order::with('orderitem')
            ->where('id', $id)
            ->first();
        $cust_orders['cust_orders'] = Order::with('orderitem','paymentimage')
            ->where('id', $id)
            ->get();
        return view('dashboard.admin.transaction.detail')
            ->with($orders)
            ->with($cust_orders);
    }

    public function updateTrans(Request $request, $id)
    {
        $orders = Order::find($id);

        $orders->status = $request->input('status_trans');
        $orders->update();

        return redirect('transaction')->with('success', "Status transaksi berhasil di ubah");

    }

    public function confirmedTrans()
    {
        $orders['orders'] = Order::where('status','1')->get();

        return view('dashboard.admin.transaction.confirmed')->with($orders);

    }

    public function rejectedTrans()
    {
        $orders['orders'] = Order::where('status','2')->get();

        return view('dashboard.admin.transaction.rejected')->with($orders);

    }

}
