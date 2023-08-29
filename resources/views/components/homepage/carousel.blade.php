{{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($listcarousels as $carousel)
            <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                <img class="d-block w-200 mr-auto ml-auto rounded-md"
                     src="{{ asset('storage/carousel-image')."/".$carousel -> image }}"
                     alt="Carousel">
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>--}}
<div class="owl-carousel owl-theme owl-wrapper carousel-center">
    @foreach($listcarousels as $carousel)
        <div class="carousel-center-item">
            <a href="{{ $carousel -> link_carousel }}}">
            <img class="d-block ca-img w-500 h-full"
                 src="{{ asset('storage/carousel-image')."/".$carousel -> image }}"
                 alt="Carousel">
            </a>
        </div>
    @endforeach
</div>

