<div class="container mt-1.5">
    <div class="row carousel-category my-2">
        <div class="col-md-12 mb-2 new-product-text">
            <h4>Kategori</h4>
            <hr>
        </div>

        <div class="slick-wrapper">
            <div id="sc-category-carousel">
                @foreach($listcategories as $listcategory)
                    <div class="item">
                        <a href="{{ url('view-category').'/'.Str::slug($listcategory -> name) }}" class="card text-black" style="text-decoration: none">
                            <img class="image-product" src="{{ asset("storage/category-image")."/".$listcategory -> image }}" alt="category-image">
                            <div class="card-body text-center">
                                <p>{{ $listcategory -> name }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
