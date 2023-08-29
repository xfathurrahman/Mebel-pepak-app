/*LOAD CART COUNT*/
    loadCart();

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadCart(){
    $.ajax({
            method: "GET",
            url:  '/load-cart-data',
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }
/*LOAD CART COUNT END*/

/*SEARCH PRODUCT FUNC*/

    var availableTags = [];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "GET",
        url: "/product-list",
        success: function (response){
            // console.log(response);
            startAutoComplete(response);
        }
    });
    function startAutoComplete(availableTags)
    {
        $( "#search_product" ).autocomplete({
            source: availableTags
        });
    }

/*SEARCH PRODUCT FUNC END*/


/*ALERT SET*/
    $("document").ready(function () {
        setTimeout(function () {
            $("div.alert").remove();
        }, 2500);
    });
/*ALERT SET END*/
