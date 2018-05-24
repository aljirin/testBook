var total_item_product = $('.c000001-product-item').length;
var viewperpage_product = document.getElementById("viewperpage").value;
var from = 0;
var to = 0;

$('.c000001-product-item').slice(0, viewperpage_product).show();


refreshPaginationProduct();

$('#view_per_page_product').on('change', function () {
    for (i = 1; i <= total_item_product; i++) {
        $('.c000001-product-item').hide();
    }
    for (i = 1; i <= total_item_product; i++) {
        $('.c000001-product-item').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage_product = this.value;

    refreshPaginationProduct();

});

function refreshPaginationProduct() {
    $('.pagination-kadkidz-minimal').empty();

    $('.pagination-kadkidz-minimal').removeData("twbs-pagination");

    $('.pagination-kadkidz-minimal').unbind("page");

    $('.pagination-kadkidz-minimal').twbsPagination({
        totalPages: Math.ceil(total_item_product / viewperpage_product),
        visiblePages: 0,
        onPageClick: function (event, page) {
            if (page > 1) {
                $(".c000001-product-item").hide();
                $(".c000001-product-item").slice(page * viewperpage_product - viewperpage_product, page * viewperpage_product).show('slide');
//
//                        $('.c000001-product-item').hide();
//                        $('.c000001-product-item').slice(page * viewperpage_product - viewperpage_product, page * viewperpage_product).show();
            }
            else if (page == 1) {
                $(".c000001-product-item").hide();
                $(".c000001-product-item").slice(0, viewperpage_product).show('slide');
//
//                        $('.c000001-product-item').hide();
//                        $('.c000001-product-item').slice(0, viewperpage_product).show();
            }

            from = page * viewperpage_product - viewperpage_product + 1;
            if (page * viewperpage_product > total_item_product) {
                to = total_item_product;
            }
            else {
                to = page * viewperpage_product;
            }
            $('.c000001-now-page').text("Showing " + from + " - " + to + " of " + total_item_product + " products");
        }
    });
}

$(function () {
    $('span.stars').stars();
});

$.fn.stars = function () {
    return $(this).each(function () {
        // Get the value
        var val = parseFloat($(this).html());
        val = Math.round(val * 4) / 4;
        /* To round to nearest quarter */
        val = Math.round(val * 2) / 2;
        /* To round to nearest half */
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 17;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
};