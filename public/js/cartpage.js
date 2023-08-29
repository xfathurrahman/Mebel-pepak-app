 // SET THE VALUE OF PRODUCT - QTY

    $(document).on('click','.increment_btn', function (e) {
        e.preventDefault();
        // var inc_value = $('.qty_input').val();
        var inc_value = $(this).closest('.product_data').find('.qty_input').val();
        var max_qty = $(this).closest('.product_data').find('.max-qty').val();

        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < max_qty) {
            value++;
            $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });

    $(document).on('click','.decrement_btn', function (e) {
        e.preventDefault();
        /*var dec_value = $('.qty_input').val();*/
        var dec_value = $(this).closest('.product_data').find('.qty_input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });

// DELETE PRODUCT FROM CART
//     $('.del-cart-btn').click(function (e) {
        $(document).on('click','.del-cart-btn', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        /*var img_value = $(this).closest('.product_data').find('#img_val').val();*/

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadCart();
                $('#refreshcart').load(location.href + " #refreshcart");
            }
        });
    });

// Change Quantity
//      $('.changeQuantity').click(function (e){
     $(document).on('click','.changeQuantity', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty_input').val();

        var data = {
            'prod_id' : prod_id,
            'prod_qty': qty,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "PUT",
            url: "/update-cart-item",
            data: data,
            success: function (response){
                $('#refreshcart').load(location.href + " #refreshcart");
                // thisClick.closest('.product_data').find('.cart-grand-total-price').text("im here");
            }
        })

    });

