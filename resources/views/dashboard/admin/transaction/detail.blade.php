<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-stream"></i> {{ __('Pesanan Masuk') }}</a></li>
            <li class="breadcrumb-item active"><a><i class="fa-solid fa-circle-info"></i> {{ __('Detail Pesanan Masuk') }}</a></li>
        </ol>
    </x-slot>

    @if(Session::has('success'))
        <div class="alert text-center alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="container-fluid py-12 mt-12 mx-1">
        <div class="card mb-4">
            <div class="card-header justify-content-center">
                <h4>Detail Pesanan</h4>
            </div>
            <div class="card-body text-left">
                <div class="row">
                    @foreach( $cust_orders as $item )
                        <div class="col-xl-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <label for="status_trans">Status Transaksi</label>
                            <form method="POST" action="{{ url('update-status-transaksi/'.$orders->id) }}">
                                @csrf
                                <select class="form-select rounded-md" name="status_trans" id="status_trans">
                                    <option {{ $orders -> status == '0' ? 'selected' : "" }} value="0">Menunggu Konfirmasi</option>
                                    <option {{ $orders -> status == '1' ? 'selected' : "" }} value="1">Konfirmasi Pesanan</option>
                                    <option {{ $orders -> status == '2' ? 'selected' : "" }} value="2">Tolak Pesanan</option>
                                </select>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="name">Penerima</label>
                                <input disabled value="{{ $item -> name }}" id="name" name="name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="phone-number">Nomor Handphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input disabled value="{{ $item -> phone_number }}" name="phone_number" id="phone-number" type="text" class="form-control phone-number" required="">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 1rem;">
                                <label for="address">Alamat Penerima</label>
                                <textarea disabled style="min-height: 100px" name="address" id="address" class="form-control {{--is-invalid--}}" required="">{{ $item -> address }}</textarea>
                                <div class="invalid-feedback">
                                    Maksimal 255 karakter.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6 text-center">
                            <label for="name">Bukti Pembayaran</label>
                            <div class="mx-auto rounded image-payment-wrapper">
                                @if(empty($item -> paymentimage -> image_path))
                                    <img class="image-payment mt-2.5 mx-auto" src="{{ asset('assets/buktitfnone.jpg') }}" alt="">
                                @else
                                    <img class="image-payment mt-2.5 mx-auto" src="{{ asset('storage/payment-image').'/'.$item -> paymentimage -> image_path }}" alt="">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-header">
                    <h4 class="mx-auto">Detail Produk</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th class="text-center">#</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Harga Satuan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders->orderitem as $item)
                                <tr class="product_data">
                                    <th class="text-center px-2" scope="row">{{ $loop->iteration }}</th>
                                    <td style="width: 10%"  class="td p-1 text-center">
                                        <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($item->products->id).'/'.Str::slug($item->products->name) ) }}">
                                            <img style="display: block; margin-left: auto; margin-right: auto;" class="img c-thumb" alt="image"
                                                 data-toggle="tooltip" title=""  src="{{ asset("storage/product-image")."/".$item -> products-> images -> image_path }}">
                                        </a>
                                    </td>
                                    <td style="width: 30%"  class="td p-1 text-center">
                                        <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($item->products->id).'/'.Str::slug($item->products->name) ) }}">
                                            <div>
                                                <p class="text-judul-product mb-1 leading-5 mx-auto">{{ $item->products->name }}</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td style="width: 30%"  class="td pt-2 text-center">
                                        <div class="input-group mr-auto ml-auto text-center" style="width: 120px;">
                                            <label class="inline-block mx-auto" for="max-qty">{{ $item -> quantity }}x&nbsp;</label>
                                        </div>
                                    </td>
                                    <td style="width: 20%"  class="td p-1 text-center">
                                        <div class="badge mx-auto">@currency($item->products->price)</div>
                                    </td>
                                </tr>
                            @endforeach
                            <td colspan="4" class="h-10 text-left pl-2 bg-gray-100">
                                <span><h6></h6></span>
                            </td>
                            <td class="h-10 bg-gray-100">
                                <span><h6 class="m-0">Total : &emsp; @currency($orders->total_price)</h6></span>
                            </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


