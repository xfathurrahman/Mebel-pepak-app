<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h5>Pembayaran</h5>
                </div>

                @if(Session::has('success'))
                    <div class="alert text-center alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <form method="POST" action="{{ route('checkout.store') }}" name="form-example-1" id="form-example-1" role="form" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body p-0">
                            @php $totalup = 0 @endphp
                            @foreach($cartitems as $cart_itemz)
                                @php $totalup += $cart_itemz->products->price * $cart_itemz->product_qty; @endphp
                            @endforeach

                            <div class="row mx-0">
                                <div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                                    <i class="text-danger fas fa-file-invoice-dollar">&nbsp;Step 1</i>
                                    <p class="m-0">Perhatikan tagihan yang perlu dibayar :</p>
                                    <h4 class="text-success inline-block m-0">@currency($totalup),-</h4>
                                    <span class="inline-block btn-outline-success mb-1 p-0 font-italic btn" style="width: 50px; font-size: small"><i class="far fa-copy"></i>&nbsp;Copy</span>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                                    <i class="text-danger fas fa-hand-holding-usd">&nbsp;Step 2</i>
                                    <p class="m-0">lakukan pembayaran ke rekening :</p>
                                    <h4 class="inline-block text-success m-0">123456789101112</h4>&nbsp;
                                    <span class="inline-block btn-outline-success mb-1.5 p-0 font-italic btn" style="width: 50px; font-size: small"><i class="far fa-copy"></i>&nbsp;Copy</span>
                                    <h6>A/n Mebel Pepak Boyolali</h6>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                                    <i class="text-danger fas fa-file-upload">&nbsp;Step 3</i>
                                    <p class="m-0">Lengkapi kolom detail pengiriman dan unggah bukti pembayaran untuk mempermudah kami mengkonfirmasi pesanan anda pada kolom di bawah, lalu tekan <b>kirim.</b></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row mx-1">
                                <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="table-responsive col-12 col-xl-12 col-lg-12 px-0 pb-4">
                                        <table class="mytable float-right p-0">
                                            <thead>
                                            <tr class="h-10 bg-gray-100">
                                                <th class="text-center">#</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Harga Satuan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $total = 0; @endphp
                                            @foreach($cartitems as $cart_item)
                                                <tr class="product_data">
                                                    <th class="px-3" scope="row">{{ $loop->iteration }}</th>
                                                    <td style="width: 50%"  class="td p-1 text-center">
                                                        <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($cart_item->products->id).'/'.Str::slug($cart_item->products->name) ) }}">
                                                            <div>
                                                                <p class="text-judul-product text-center mb-1 leading-5 text-justify">{{ $cart_item->products->name }}</p>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td style="width: 20%"  class="td pt-2 text-center">
                                                        <div>
                                                            <label class="inline-block p-0 m-0" for="max-qty">{{ $cart_item -> product_qty }}x&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td style="width: 30%"  class="td p-1 text-center">
                                                        <div>@currency($cart_item->products->price)</div>
                                                    </td>
                                                </tr>
                                                @php $total += $cart_item->products->price * $cart_item->product_qty; @endphp
                                            @endforeach
                                            <td colspan="3" class="h-10 text-left pl-2 bg-gray-100">
                                                <span><h6>Total:</h6></span>
                                            </td>
                                            <td class="h-10 bg-gray-100">
                                                <span><h6>@currency($total)</h6></span>
                                            </td>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="card mb-4">
                                                <div class="card-header">
                                                    <h4>Detail Pengiriman</h4>
                                                </div>

                                                @if( $errors -> any() )
                                                    @foreach($errors->all() as $error)
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $error }}
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="card-body text-left">
                                                    <div class="form-group">
                                                        <label for="name">Nama Lengkap</label>
                                                        <input value="{{ Auth::user()->name }}" id="name" name="name" class="form-control" required oninvalid="this.setCustomValidity('Kolom Nama tidak boleh kosong.')">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone-number">Nomor Handphone</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input value="{{ Auth::user()->phone_number }}" name="phone_number" id="phone-number" type="text" class="form-control phone-number" required oninvalid="this.setCustomValidity('Kolom Nomor Hp tidak boleh kosong.')">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 1rem;">
                                                        <label for="address">Alamat Lengkap</label>
                                                        <textarea name="address" id="address" class="form-control" required oninvalid="this.setCustomValidity('Kolom Alamat tidak boleh kosong.')">{{ Auth::user()->address }}</textarea>
                                                        <div class="invalid-feedback">
                                                            Maksimal 255 karakter.
                                                        </div>
                                                    </div>
                                                    <div class="md:mt-0 md:col-span-2">
                                                        <label for="payment">Bukti Pembayaran</label>
                                                        <div class="bg-white space-y-6 sm:p-6 px-0 pt-0">
                                                            <div class="input-field">
                                                                <div class="input-images-1"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-footer pb-0 bg-white px-0">
                        <div class="float-right">
                            <div class="inline-block ml-2">
                                <button type="submit" class="mb-2.5 mr-2.5 btn btn-warning text-white"><h5>Kirim</h5></button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
