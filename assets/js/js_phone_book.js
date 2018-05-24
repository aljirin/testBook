var count_sms = $('.phonebook-table .item').length;
var viewperpage = 15;

$('#phonebook-table .item').slice(0, viewperpage).show();

$('.sort-by-phonebook').on('change', function () {

    var divs = document.getElementsByClassName("sort-by-phonebook");

    window.location.href = "?sort_by=" + $(this).val() + "&table=_sms_history";
});

$('.filter-by-month-phonebook').on('change', function () {

    var divs = document.getElementsByClassName("filter-by-month-phonebook");
    window.location.href = "?filter_month=" + $(this).val();
});

$('.view-per-page-phonebook').on('change', function () {
    for (i = 1; i <= count_sms; i++) {
        $('#phonebook-table .item').hide();
    }
    for (i = 1; i <= count_sms; i++) {
        $('#phonebook-table .item').slice(0, this.value).slideDown();
    }

    $('html,body').animate({
        scrollTop: $(this).offset().top
    }, 1500);
    viewperpage = this.value;

    refreshPaginationPhoneBook();

});

refreshPaginationPhoneBook();

$("#search_sms").keyup(function () {
    var filter = $(this).val();
    $("#phonebook-table .item").each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
});



function refreshPaginationPhoneBook() {
    $('.pagination-phonebook').empty();

    $('.pagination-phonebook').removeData("twbs-pagination");

    $('.pagination-phonebook').unbind("page");

    $('.pagination-phonebook').twbsPagination({
        totalPages: Math.ceil(count_sms / viewperpage),
        visiblePages: 7,
        onPageClick: function (event, page) {
            if (page > 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#phonebook-table .item').hide();
                    $('#phonebook-table .item').slice(page * viewperpage - viewperpage, page * viewperpage).show();
                    $('html,body').animate({
                        scrollTop: $(this).offset().top
                    }, 50);
                }
            }
            else if (page == 1) {
                for (i = 1; i <= count_sms; i++) {
                    $('#phonebook-table .item').hide();
                    $('#phonebook-table .item').slice(0, viewperpage).show();
                }
            }


        }
    });
}
