/*CAROUSEL AKTIF*/

// pangil function diri sendiri agar di load pertamaa
loadCarousel();

function loadCarousel() {
    $(document).ready(function () {
        $('.first ol li a').click(function () {
            $('.first ol li a.active-1').removeClass('active-1');
            $(this).closest('a').addClass('active-1');
        });
    });

    $('.carousel').carousel({
        touch: false
    });
    /*CAROUSEL THUMBNAIL*/
    $(document).ready(function () {
        $('.owl-carousel-detail').owlCarousel({
            loop: false,
            margin: 0,
            autoWidth: true,
            nav: false,
            item: 5,
            paginationSpeed: 200,
            slideSpeed: 100,
            mouseDrag: false,
            touchDrag: false,
            slide: false,
            dots: false,
            /*navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],*/
        })
    });
    /*LOOP DATA SLIDE*/
    /*Loop Function*/
    var abcElements = document.querySelectorAll('.img-thumbnail-detail');
    for (var i = 0; i < abcElements.length; i++) {
        abcElements[i].id = +i;
        abcElements[i].setAttribute('data-slide-to', i);
    }
    /*ZOOM FUNCTION*/
    $(function () {
        $('.image-zoom').each(function () {
            let originalImagePath = $(this).find('img').data('original-image');
            $(this).zoom({
                url: originalImagePath,
                magnify: 2
            });
        });
    });
    /*Tab Deskripsi*/
    let tabs = document.querySelector(".tabs");
    let tabHeader = tabs.querySelector(".tab-header");
    let tabBody = tabs.querySelector(".tab-body");
    let tabIndicator = tabs.querySelector(".tab-indicator");
    let tabHeaderNodes = tabs.querySelectorAll(".tab-header > div");
    let tabBodyNodes = tabs.querySelectorAll(".tab-body > div");

    for (let i = 0; i < tabHeaderNodes.length; i++) {
        tabHeaderNodes[i].addEventListener("click", function () {
            tabHeader.querySelector(".active").classList.remove("active");
            tabHeaderNodes[i].classList.add("active");
            tabBody.querySelector(".active").classList.remove("active");
            tabBodyNodes[i].classList.add("active");
            tabIndicator.style.left = `calc(calc(calc(100% - 5px) * ${i}) + 10px)`;
        });
    }
    /*klik scroll deskripsi*/
    myID = document.getElementById("buyer-action-id");

    var myScrollFunc = function () {
        var y = window.scrollY;
        if (y >= 400) {
            myID.className = "buyer-action show"
        } else {
            myID.className = "buyer-action hide"
        }
    };
    window.addEventListener("scroll", myScrollFunc);

    // smooth scroll
    window.smoothScroll = function (target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);

        var targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);

        scroll = function (c, a, b, i) {
            i++;
            if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function () {
                scroll(c, a, b, i);
            }, 10);
        }
        // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
}

/*TAMBAH KE KERANJANG*/
$(document).on('click','.addToCartBtn', function (e) {
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty_input').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            'product_id': product_id,
            'product_qty': product_qty,
        },
        success: function (response) {
            // window.location.reload();
            loadCart();
            loadCarousel();
            $('#refreshcart').load(location.href + " #refreshcart");
            Swal.fire({
                position: 'top-end',
                title: response.status,
                showConfirmButton: false,
                timer: 1500,
                imageUrl: 'http://localhost:8000/storage/assets/cartred.png',
                imageWidth: 50,
                imageHeight: 50,
                imageAlt: 'cart',
                // customClass: 'custom_swal',
                // html: 'http://dev.markitondemand.com/Api/v2/Quote/jsonp?symbol='+ $('input#symbolInput').val(),
            });
        }
    });
});

$('.increment_btn').click(function (e) {
    e.preventDefault();

    var max_qty = $(this).closest('.product_data').find('.max-qty').val();

    var inc_value = $('.qty_input').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value < max_qty) {
        value++;
        $('.qty_input').val(value);
    }
});

$('.decrement_btn').click(function (e) {
    e.preventDefault();
    var dec_value = $('.qty_input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
        value--;
        $('.qty_input').val(value);
    }
});

/*TAMBAH KE KERANJANG ENDDD*/
