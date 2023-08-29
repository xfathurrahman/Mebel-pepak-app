<div class="container" >
    <div id="productslider" class="carousel" data-interval="false">
        <div class="row product_data">

            <div class="col-lg-5 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <hr class="target-scroll opacity-0 p-0 m-0" id="tab-row">
                        <div class="carousel-inner mx-auto bg-white">
                            @foreach( $images as $image )
                                <div id="zoom" class="carousel-item image-zoom {{ $loop->iteration == 1 ? 'active' : '' }}">
                                    <img src="{{ asset("storage/product-image")."/".$image -> image_path }}"
                                         alt="" class="image-product-slide block mx-auto">
                                    {{--<span class="sale-span text-uppercase">&nbsp;&nbsp;Nego</span>--}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 mt-2.5 mx-auto" style="padding: 0">
                        <div class="owl-carousel owl-carousel-detail owl-theme">
                            @foreach( $images as $image )
                                <button type="button" data-target="#productslider" data-slide-to="#i" class="active img-thumbnail-detail btn btn-outline-success">
                                    <div class="item">
                                        <div class="data-slide-image">
                                            <img src="{{ asset('storage/product-image').'/'.$image -> image_path }}"
                                                 alt="" class="img-thumb">
                                        </div>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 col-md-12 product-detail-column">
                <h3 class="product-name-detail">{{ $details -> name }}</h3>

                <hr style="margin: 10px 0;">

                <div class="price-wrapper">
                    <div class="price">@currency( $details -> price )</div>
{{--                    <div class="item-wrapper">
                        <div class="price-item text-uppercase my-1">
                            NETT ( Harga sudah tidak bisa di tawar )
                            NEGO ( Harga bisa di tawar )
                            <span class="diskon">diskon</span>
                            <span>75%</span>
                        </div>
                        <div class="original-price">
                            <span class="diskon">Harga sebelum diskon </span>
                            <span>Rp. 12.000.000</span>
                        </div>
                    </div>--}}
                </div>

                <hr style="margin: 10px 0;">

                <h6>Detail Barang</h6>
                <div class="row">
                    <div class="col-3 text-gray-400">
                        <ol class="p-0 m-0">
                            <li>Kategori</li>
                            <li>Stok</li>
                        </ol>
                    </div>
                    <div class="col-9">
                        <ol class="p-0 m-0">
                            <li>: <a class="font-weight-800 text-red-400 hover:text-red-500 font-weight-bold" style="text-decoration: none" href="{{ url('view-category').'/'.Str::slug($details -> categories -> name) }}">{{ $details -> categories -> name }}</a></li>
                            @if($details -> quantity > 0)
                            <li>: {{ $details -> quantity }}</li>
                            @else
                                <li>:
                                    <div class="inline badge-danger rounded-lg">&emsp;Habis&emsp;</div>
                                </li>
                            @endif
                        </ol>
                    </div>
                </div>

                <div class="main-detail-seller bg-white rounded-md">

                    <hr style="margin: 10px 0;">

                    @if(Auth::check() && Auth::user()->level == 1 || Auth::check() && Auth::user()->level == 2 )
                        <a href="{{ url('products/edit').'/'.$details->id }}">
                            <button type="button" class="btn btn-success btn-kontak">
                                <i class="fas fa-file-signature" aria-hidden="true"></i>&emsp;Edit Produk
                            </button>
                        </a>
                    @else

                        <h6>Kuantitas</h6>

                        <div class="row text-center text-white mt-3">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <param hidden class="max-qty inline-block p-0 m-0" id="max-qty" value="{{ $details -> quantity }}" name="max-qty">
                                <input type="hidden" value="{{ $details->id }}" class="prod_id">
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    <button class="input-group-text decrement_btn">-</button>
                                    <input disabled type="text" name="quantity" class="qty_input bg-white form-control text-center" value="1">
                                    <button class="input-group-text increment_btn">+</button>
                                </div>
                            </div>

                            <div class="ml-auto mr-0 col-xl-9 col-lg-9 col-md-9 col-sm-9">
                                <div class="btn-success rounded-md">
                                    @if($details -> quantity > 0)
                                        <button type="button" class="addToCartBtn btn text-white">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Tambah Ke Keranjang
                                        </button>
                                    @else
                                        <button disabled type="button" class="addToCartBtn btn text-white">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Tambah Ke Keranjang
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <td class="cart-product-quantity" >
                                    <div class="input-group quantity" style="width: 120px">
                                        <button class="input-group-prepend decrement-btn" style="cursor: pointer">
                                            <span class="input-group-text">-</span>
                                        </button>
                                        <input type="text" class="qty-input form-control text-center" id="valueatas" disabled value="">
                                        <button class="input-group-append increment-btn" style="cursor: pointer">
                                            <span class="input-group-text">+</span>
                                        </button>
                                    </div>
                                </td>
                            </div>

                            <div class="ml-auto mr-0 col-xl-9 col-lg-9 col-md-9 col-sm-9">

                                <form action="{{url('add-to-cart')}}" method="post">
                                    @csrf
                                    <div class="add-to-cart-detail btn-success rounded-md">
                                        <input type="hidden" name="quantity" id="valuebawah" value="">
                                        <input type="hidden" name="id" value="{{$details -> id}}">
                                        <button type="button" class="btn btn_add_to_cart text-white">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Tambah Ke Keranjang
                                        </button>
                                    </div>
                                </form>
                            </div>--}}

                            {{--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                <a href="{{ url( 'buy-direct/'.Str::slug($details->id) ) }}">
                                    <button type="button" class="btn btn-outline-success btn-kontak">
                                        BELI LANGSUNG
                                    </button>
                                </a>
                            </div>--}}
                        </div>

                    @endif


{{--                        <hr style="margin: 10px 0 7.7px 0;">
                        <div class="row text-center ads-action">
                            <div class="col-6">
                                <a href="#">
                                    <div class="share-ads text-center">
                                        <i class="fas fa-share-alt"></i>
                                        <span>Bagikan Iklan</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#">
                                    <div class="report-ads text-center">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <span>Laporkan Iklan</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <hr style="margin: 7.7px 0 10px 0;">--}}

                </div>

            </div>

        </div>
    </div>

    <hr style="margin: 10px 0 0 0;">

    <div class="product-details-desc">
        <div class="row" id="tab-row">
            <div class="col-lg-12 col-md-12">
                <div class="tabs">
                    <div class="tab-header">
                        <div onclick="smoothScroll(document.getElementById('tab-row'))" class="active"><i class="fas fa-file-signature" style="margin-left: -10px" aria-hidden="true"></i>&emsp;Deskripsi</div>
                        {{--<div onclick="smoothScroll(document.getElementById('tab-row'))"><i class="fas fa-comments-dollar" aria-hidden="true"></i>&emsp;Komentar</div>--}}
                       {{-- <div onclick="smoothScroll(document.getElementById('tab-row'))">&emsp;<i class="fa fa-map-marked-alt" aria-hidden="true"></i>&emsp;Lokasi</div>--}}
                    </div>
                    {{--<div class="tab-indicator"></div>--}}
                    <div class="tab-body">
                        <div class="active">
                           <?php echo htmlspecialchars_decode($details -> description);?>
                        </div>
                        <div>
                            <p>komen</p>
                        </div>
                        <div>
                            <p>lokasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-1.5">
        <div class="row carousel-product my-2">
            <div class="mb-8 w-full new-product-text text-left">
                <h4 class="mx-3.5 xl:font-semibold">Produk Terkait
                    <a href="{{ url('view-category').'/'.Str::slug($details -> categories -> name) }}" class="button float-right">Lihat Semua</a>
                </h4>
                <hr>
            </div>
            <div class="owl-carousel sc-products-carousel pl-2.5 owl-theme">
                @foreach($related_product as $related_item)
                    <div class="item mx-1">
                        <div class="card">
                            <div class="date-option">
                               <span class="date-post">
                                   {{ $related_item -> created_at -> diffForHumans() }}
                               </span>
                            </div>
                            @if(Auth::check() && Auth::user()->level == 0 )
                                <div class="add-to-cart product_data">
                                    <button class="">
                                        <input type="hidden" class="qty_input" name="product_qty" value="1">
                                        <input type="hidden" class="prod_id" name="product_id" value="{{ $related_item->id }}">
                                        <button type="button" class="btn addToCartBtn">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </button>
                                </div>
                            @endif
                            <a class="a-link" href="{{ url( 'detail/'.Str::slug($related_item->id ).'/'.Str::slug($related_item->name))}}">
                                <img class="image-product" src="{{ asset("storage/product-image").'/'.$related_item -> images -> image_path }}" alt="">
                                <div class="card-body p-2">
                                    <div class="tag-price">
                                        <div class="tag-img"></div>
                                        <div class="tag-text">{{ "Rp.".number_format($related_item -> price) }}</div>
                                    </div>
                                    <div class="product-name text-left">{{ $related_item -> name }} </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

{{--@if(Auth::check() && Auth::user()->level == 0 )
<div id="buyer-action-id" class="buyer-action hide">
    <div class="wrap-info-action inline-flex">
        <div class="tag-info-product inline-flex mr-2">
            <img src="{{ asset('storage/product-image').'/'.$imagesthumb -> image_path }}"
                 alt="" class="w-10 h-10 rounded-md">
            <p>{{ $details -> name }}</p>
        </div>
    </div>
    <div class="tag-contact-product inline-flex">
        <i class="fas fa-circle-notch"></i>
        <div class="bg-dark text-white text-center p-2 price-btn inline-flex">
            <i class="fas fa-circle my-auto"></i>&nbsp;&nbsp;
            <p style="min-width: 100px">@currency( $details -> price )</p>
        </div>
        <button class="btn-buy btn contact-seller-btn" type="button">BELI SEKARANG</button>
    </div>
</div>
@endif--}}

