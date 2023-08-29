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
