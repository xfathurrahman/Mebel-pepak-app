<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h5>Pembayaran</h5>
                </div>

                <div class="card-body p-0">

                    <div class="row mx-0">
                        <div class="col-xl-4 col-sm-4 col-md-4 col-lg-4">
                            <i class="text-danger fas fa-file-invoice-dollar">&nbsp;Step 1</i>
                            <p class="m-0">Perhatikan tagihan yang perlu dibayar :</p>
                            <h4 class="text-success inline-block m-0">10000,-</h4>
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
                            <p class="m-0">Unggah bukti pembayaran untuk mempermudah kami mengkonfirmasi pesanan anda pada kolom di bawah, lalu tekan <b>kirim.</b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="table-responsive col-12 col-xl-12 col-lg-12 pb-4 pl-3">
                                <table class="mytable float-right p-0">
                                    <thead>
                                    <tr class="h-10 bg-gray-100">
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga Satuan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="product_data">
                                            <td style="width: 60%" class="td p-1 text-center">
                                                <a class="text-decoration-none text-black" href="{{ url( 'detail/'.Str::slug($product->id).'/'.Str::slug($product->name) ) }}">
                                                    <div>
                                                        <p class="text-judul-product text-center mb-1 leading-5 text-justify">{{ $product->name }}</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td style="width: 10%" class="td pt-2 text-center">
                                                <div>
                                                    <label class="inline-block p-0 m-0" for="max-qty">1</label>
                                                </div>
                                            </td>
                                            <td style="width: 50%" class="td p-1 text-center">
                                                <div>@currency($product->price)</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                            <form method="POST" action="{{ route('products.store') }}" name="form-example-1" id="form-example-1" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="mx-auto">
                                    <div class="md:mt-0 md:col-span-2">
                                        <div class="bg-white space-y-6 sm:p-6">
                                            <div class="input-field">
                                                <div class="input-images-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-footer pb-0 px-0">
                    <div class="float-right">
                        <div class="inline-block ml-2">
                            <a href="#" class="mb-2.5 mr-2.5 btn btn-warning"><h5>Kirim</h5></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
