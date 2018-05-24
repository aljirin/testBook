var count_sms = $('.group-table .group-item').length;
var viewperpage = 15;

$('#group-table .group-item').slice(0, viewperpage).show();

$('.sort-by-group').on('change', function () {

    var divs = document.getElementsByClassName("sort-by-group");

    window.location.href = "?sort_by=" + $(this).val() + "&table=_sms_history";
});

$('.filter-by-month-group').on('change', function () {

    var divs = document.getElementsByClassName("filter-by-month-group");
    window.location.href = "?filter_month=" + $(this).val();
});

$('.view-per-page-group').on('change', function () {
    for (i = 1; i <= count_sms; i++) {
        $('#group-table .group-item').hide();
    }
    for (i = 1; i <= count_sms; i++) {
        $('#group-table .group-item').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage = this.value;

    refreshPaginationGroup();

});

refreshPaginationGroup();

$("#search_sms").keyup(function () {
    var filter = $(this).val();
    $("#group-table .group-item").each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
});

function refreshPaginationGroup() {
    $('.pagination-group').empty();

    $('.pagination-group').removeData("twbs-pagination");

    $('.pagination-group').unbind("page");

    $('.pagination-group').twbsPagination({
        totalPages: Math.ceil(count_sms / viewperpage),
        visiblePages: 7,
        onPageClick: function (event, page) {
            if (page > 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#group-table .group-item').hide();
                    $('#group-table .group-item').slice(page * viewperpage - viewperpage, page * viewperpage).show();
                    $('html,body').animate({
                        scrollTop: $(this).offset().top
                    }, 50);
                }
            }
            else if (page == 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#group-table .group-item').hide();
                    $('#group-table .group-item').slice(0, viewperpage).show();
                }
            }


        }
    });
}
