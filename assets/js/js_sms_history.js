var count_sms = $('.sms-history-table .sms-item').length;
var viewperpage = 5;

$('#sms-history-table .sms-item').slice(0, viewperpage).show();

$('.sort-by-sms-history').on('change', function () {

    var divs = document.getElementsByClassName("sort-by-sms-history");

    window.location.href = "?sort_by=" + $(this).val() + "&table=_sms_history";
});

$('.filter-by-month-sms-history').on('change', function () {

    var divs = document.getElementsByClassName("filter-by-month-sms-history");
    window.location.href = "?filter_month=" + $(this).val();
});

$('.view-per-page-sms-history').on('change', function () {
    for (i = 1; i <= count_sms; i++) {
        $('#sms-history-table .sms-item').hide();
    }
    for (i = 1; i <= count_sms; i++) {
        $('#sms-history-table .sms-item').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage = this.value;

    refreshPaginationSMSHistory();

});

refreshPaginationSMSHistory();

$("#search_sms").keyup(function () {
    var filter = $(this).val();
        $("#sms-history-table .sms-item").each(function () {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
});

function refreshPaginationSMSHistory() {
    $('.pagination-sms-history').empty();

    $('.pagination-sms-history').removeData("twbs-pagination");

    $('.pagination-sms-history').unbind("page");

    $('.pagination-sms-history').twbsPagination({
        totalPages: Math.ceil(count_sms / viewperpage),
        visiblePages: 7,
        onPageClick: function (event, page) {
            if (page > 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#sms-history-table .sms-item').hide();
                    $('#sms-history-table .sms-item').slice(page * viewperpage - viewperpage, page * viewperpage).show();
                    $('html,body').animate({
                        scrollTop: $(this).offset().top
                    }, 50);
                }
            }
            else if (page == 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#sms-history-table .sms-item').hide();
                    $('#sms-history-table .sms-item').slice(0, viewperpage).show();
                }
            }


        }
    });
}
