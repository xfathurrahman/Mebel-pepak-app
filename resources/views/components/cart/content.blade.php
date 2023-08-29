<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h5>Keranjang Saya</h5>
                </div>
                <div class="card-body p-0">
                    @if ( $cartitems->count() > 0 )
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th class="text-center">#</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Harga Satuan</th>
                                <th class="text-center">Kuantitas</th>
                                {{--<th class="text-center">Total</th>--}}
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @foreach($cartitems as $cart_item)
                                <tr class="product_data">
    {{--                                <input type="hidden" id="img_val" name="img_val" class="img_val inline-block p-0 m-0" value="{{ asset("http://localhost:8000/storage/product-image")."/".$cart_item -> products-> images -> image_path }}">--}}
                                    <th class="text-center px-2" scope="row">{{ $loop->iteration }}</th>
                                    <td style="width: 10%"  class="td p-1 text-center">
                                        <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($cart_item->products->id).'/'.Str::slug($cart_item->products->name) ) }}">
                                            <img style="display: block; margin-left: auto; margin-right: auto;" class="img c-thumb" alt="image"
                                                 data-toggle="tooltip" title=""  src="{{ asset("storage/product-image")."/".$cart_item -> products-> images -> image_path }}">
                                        </a>
                                    </td>
                                    <td style="width: 30%"  class="td p-1 text-center">
                                        <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($cart_item->products->id).'/'.Str::slug($cart_item->products->name) ) }}">
                                            <div>
                                                <p class="text-judul-product mb-1 leading-5 text-justify">{{ $cart_item->products->name }}</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td style="width: 20%"  class="td p-1 text-center">
                                        <div class="badge badge-warning">@currency($cart_item->products->price)</div>
                                    </td>
                                    <td style="width: 30%"  class="td pt-2 text-center">
                                        <input type="hidden" value="{{ $cart_item -> products -> id }}" class="prod_id">
                                            <div class="input-group mr-auto ml-auto text-center" style="width: 120px;">
                                                <button class="input-group-text changeQuantity decrement_btn">-</button>
                                                @if( $cart_item -> products -> quantity < $cart_item -> product_qty)
                                                    <input type="text" name="quantity" class="qty_input form-control text-center bg-white" disabled value="0">
                                                @else
                                                    <input type="text" name="quantity" class="qty_input form-control text-center bg-white" disabled value="{{ $cart_item -> product_qty }}">
                                                @endif
                                                <button class="input-group-text changeQuantity increment_btn">+</button>
                                            </div>
                                            <div>
                                                <label class="inline-block p-0 m-0" for="max-qty">{{ $cart_item -> products -> quantity }}&nbsp;tersisa</label>
                                                <param class="max-qty inline-block p-0 m-0" id="max-qty" value="{{ $cart_item -> products -> quantity }}" name="max-qty">
                                            </div>
                                    </td>
                                    {{--grand total
                                    <td style="width: 15%"  class="td p-1 text-center">
                                        <span class="badge badge-warning cart-grand-total-price">@currency($cart_item->products->price)</span>
                                    </td>--}}
                                    <td style="width: 10%"  class="td p-1 text-center">
                                        <button class="btn btn-danger del-cart-btn">
                                            <i class="fas fa-trash"></i>&nbsp;Hapus
                                        </button>
                                    </td>
                                </tr>
                                @php $total += $cart_item->products->price * $cart_item->product_qty; @endphp
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                    @else
                        <img class="mr-auto mt-10 ml-auto" style="max-width: 400px" src="{{ asset('assets/empty-cart.png') }}" alt="">
                        <h5 class="h-10 text-center">Anda belum memasukan barang apapun ke keranjang</h5>
                    @endif
                </div>
                @if ( $cartitems->count() > 0 )
                    <div class="card-footer pb-0 px-0">
                        <div class="float-right">
                            <div class="inline-block align-content-center">
                                <small>Total ( {{ $totalcart }} Produk) :
                                    <h4>@currency($total)</h4>
                                </small>
                            </div>
                            <div class="inline-block ml-2">
                                <a href="{{ url('checkout') }}" class="mb-4 mr-2.5 btn btn-warning">Checkout</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
