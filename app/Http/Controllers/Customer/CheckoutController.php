<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentImage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item)
        {
            if (!Product::where('id', $item->product_id)->where('quantity','>=',$item->product_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('product_id',$item->product_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        $product = Product::where('user_id', Auth::id())->get();

        return view('layouts.checkout', compact('cartitems','product'));
    }

//    public function buyDirect($id)
//    {
//        $product['product'] = Product::with(['users','categories','images'])->find($id);
//
//        return view('layouts.direct_checkout')->with($product);
//    }

    /**
     * @throws ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $messages = array(
            'files.required'=>'Anda harus menyertakan Bukti Pembayaran',
        );

        $rules = array(
            'name'=>'required|string',
            'phone_number'=>'required',
            'address'=>'required',
            'tracking_no'=>'string',
            'files' => 'required',
        );

        $this->validate($request, $rules, $messages);

        $order  = new Order;
        $order -> user_id = Auth::id();
        $order -> name = $request->input('name');
        $order -> phone_number = $request->input('phone_number');
        $order -> address = $request->input('address');
        $order -> tracking_no = 'MP-'.rand(1111,9999);

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $product)
        {
            $total += $product-> products-> price * $product->product_qty;
        }
        $order-> total_price = $total;

        $order -> save();

        $order_id=$order->id;
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->product_qty,
                'price' =>  $item->products->price,
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->product_qty;
            $product->update();
        }

        if(Auth::user()->address = null)
        {
            $user  = User::where('id', Auth::id()->first());
            $user -> name = $request->input('name');
            $user -> phone_number = $request->input('phone_number');
            $user -> address = $request->input('address');
            $user -> update();
        }

        if ($request->hasfile('files')) {
            $files = $request->file('files');

            foreach($files as $file) {
                $image  = new PaymentImage;
                $name   = time().'.'.$file->getClientOriginalName();
                $path   = public_path('/storage/payment-image');
                $file  -> move($path, $name);
                $image -> order_id=$order_id;
                $image -> image_path=$name;
                $image -> save();
            }

        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect(route('myOrder'))->with("success", "Pesanan anda berhasi ditambahkan");
    }

}
