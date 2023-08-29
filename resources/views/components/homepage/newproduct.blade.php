{{--Banner--}}
{{--    <div class="container p-0">
        <div class="owl-carousel owl-theme owl-wrapper carousel-ads">
            <div class="carousel-center-item">
                <img src="{{ asset('assets/banner.jpg') }}" alt="banner-ads">
            </div>
            <div class="carousel-center-item">
                <img src="{{ asset('assets/banner.jpg') }}" alt="banner-ads">
            </div>
        </div>
    </div>--}}
<div class="container mt-1.5">
    <div class="row carousel-product my-2">
        <div class="mb-8 w-full new-product-text text-center">
            <h4 class="mx-3.5 xl:font-semibold">Produk Terbaru
{{--                <a href="{{ url('new-products') }}" class="button float-right">Lihat Semua</a>--}}
            </h4>
            <hr>
        </div>
        <div class="owl-carousel sc-products-carousel pl-2.5 owl-theme">
            @foreach($listproducts as $item)
                <div class="item mx-1">
                    <div class="card">
                        <div class="date-option">
                               <span class="date-post">
                                   {{ $item -> created_at -> diffForHumans() }}
                               </span>
                        </div>

                        {{--<form action="{{url('add-to-cart')}}" method="post">
                            @csrf
                            <div class="add-to-cart">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="id" value="{{$item -> id}}">
                                <button class="btn">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>--}}

                        @if(Auth::check() && Auth::user()->level == 0 )

                            @if($item->quantity > 0)
                                <div class="add-to-cart product_data">
                                    <button class="">
                                        <input type="hidden" class="qty_input" name="product_qty" value="1">
                                        <input type="hidden" class="prod_id" name="product_id" value="{{ $item->id }}">
                                        <button type="button" class="btn addToCartBtn">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </button>
                                </div>
                            @endif

                        @endif

                        <a class="a-link" href="{{ url( 'detail/'.Str::slug($item->id ).'/'.Str::slug($item->name))}}">
                            <img class="image-product" src="{{ asset("storage/product-image")."/".$item -> images -> image_path }}" alt="Image from {{ $item->users->name }}">
                            <div class="card-body p-2">
                                <div class="tag-price">
                                    <div class="tag-img"></div>
                                    <div class="tag-text">{{ "Rp.".number_format($item -> price) }}</div>
                                </div>
                                <div class="product-name text-left">{{ $item -> name }} </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
