var total_item_product_2 = $('.c000001-product-item-2').length;
var viewperpage_product_2 = document.getElementById("viewperpage2").value;
var from = 0;
var to = 0;

$('.c000001-product-item-2').slice(0, viewperpage_product_2).show();


refreshPaginationProduct2();

$('#view_per_page_product').on('change', function () {
    for (i = 1; i <= total_item_product_2; i++) {
        $('.c000001-product-item-2').hide();
    }
    for (i = 1; i <= total_item_product_2; i++) {
        $('.c000001-product-item-2').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage_product_2 = this.value;

    refreshPaginationProduct2();

});

function refreshPaginationProduct2() {
    $('.pagination-kadkidz-minimal-2').empty();

    $('.pagination-kadkidz-minimal-2').removeData("twbs-pagination");

    $('.pagination-kadkidz-minimal-2').unbind("page");

    $('.pagination-kadkidz-minimal-2').twbsPagination({
        totalPages: Math.ceil(total_item_product_2 / viewperpage_product_2),
        visiblePages: 0,
        onPageClick: function (event, page) {
            if (page > 1) {
                $(".c000001-product-item-2").hide();
                $(".c000001-product-item-2").slice(page * viewperpage_product_2 - viewperpage_product_2, page * viewperpage_product_2).show('slide');
//
//                        $('.c000001-product-item-2').hide();
//                        $('.c000001-product-item-2').slice(page * viewperpage_product_2 - viewperpage_product_2, page * viewperpage_product_2).show();
            }
            else if (page == 1) {
                $(".c000001-product-item-2").hide();
                $(".c000001-product-item-2").slice(0, viewperpage_product_2).show('slide');
//
//                        $('.c000001-product-item-2').hide();
//                        $('.c000001-product-item-2').slice(0, viewperpage_product_2).show();
            }

            from = page * viewperpage_product_2 - viewperpage_product_2 + 1;
            if (page * viewperpage_product_2 > total_item_product_2) {
                to = total_item_product_2;
            }
            else {
                to = page * viewperpage_product_2;
            }
            $('.c000001-now-page').text("Showing " + from + " - " + to + " of " + total_item_product_2 + " products");
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