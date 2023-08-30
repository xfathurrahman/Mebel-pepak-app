<div class="container-lg">
    <div class="row" style="min-height: 400px!important;">
        @foreach($product as $item)
        <div class="col-md-2 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="{{ url( 'detail/'.$item->id.'/'.Str::slug($item->name))}}">
                        <img style="display: block; margin-left: auto; margin-right: auto;"
                             class="pic-1"
                             src="{{ asset("storage/product-image")."/".$item -> images -> image_path }}"
                             alt="{{ $item -> images -> image_path }}">
                    </a>
                    {{--<span class="product-new-label">{{ $cate -> name }}</span>--}}
                </div>
                <div class="product-content p-0">
                    <div class="relative">
                        <img class="h-6" src="{{ asset('assets/tagbgred.png') }}" alt="tag">
                        <span class="px-2 font-bold text-white absolute left-0 top-0">
                            {{ "Rp.".number_format($item->price) }}
                        </span>
                    </div>
                    <div class="product-name text-left">{{ $item -> name }}</div>
                </div>
                <div class="date-option">
                    <span class="date-post">
                        {{ $item -> created_at -> diffForHumans() }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    {{--<div class="row product-category my-2">
        @foreach($product as $item)
            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                <div class="card mx-2">
                    <div class="date-option">
                    <span class="date-post">
                        {{ $item -> created_at -> diffForHumans() }}
                    </span>
                    </div>
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
            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                <div class="card mx-2">
                    <div class="date-option">
                    <span class="date-post">
                        {{ $item -> created_at -> diffForHumans() }}
                    </span>
                    </div>
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
            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                <div class="card mx-2">
                    <div class="date-option">
                    <span class="date-post">
                        {{ $item -> created_at -> diffForHumans() }}
                    </span>
                    </div>
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
    </div>--}}
</div>
