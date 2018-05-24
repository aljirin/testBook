var count_sms = $('.campaign-table .item').length;
var viewperpage = 5;

$('#campaign-table .item').slice(0, viewperpage).show();

$('.sort-by-campaign').on('change', function () {

    var divs = document.getElementsByClassName("sort-by-campaign");

    window.location.href = "?sort_by=" + $(this).val() + "&table=_sms_history";
});

$('.filter-by-month-campaign').on('change', function () {

    var divs = document.getElementsByClassName("filter-by-month-campaign");
    window.location.href = "?filter_month=" + $(this).val();
});

$('.view-per-page-campaign').on('change', function () {
    for (i = 1; i <= count_sms; i++) {
        $('#campaign-table .item').hide();
    }
    for (i = 1; i <= count_sms; i++) {
        $('#campaign-table .item').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage = this.value;

    refreshPaginationSMSHistory();

});

refreshPaginationSMSHistory();

$("#search_campaign").keyup(function () {
    var filter = $(this).val();
    $("#campaign-table .item").each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
});

function refreshPaginationSMSHistory() {
    $('.pagination-campaign').empty();

    $('.pagination-campaign').removeData("twbs-pagination");

    $('.pagination-campaign').unbind("page");

    $('.pagination-campaign').twbsPagination({
        totalPages: Math.ceil(count_sms / viewperpage),
        visiblePages: 7,
        onPageClick: function (event, page) {
            if (page > 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#campaign-table .item').hide();
                    $('#campaign-table .item').slice(page * viewperpage - viewperpage, page * viewperpage).show();
                    $('html,body').animate({
                        scrollTop: $(this).offset().top
                    }, 50);
                }
            }
            else if (page == 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#campaign-table .item').hide();
                    $('#campaign-table .item').slice(0, viewperpage).show();
                }
            }


        }
    });
}
