
$('.sort_by_catalog1').on('change', function () {

    var divs = document.getElementsByClassName("sort_by_catalog1");
    for (var i = 0; i < divs.length; i++) {
        divs[i].value = $(this).val();
    }

    window.location.href="?sort_by="+$(this).val()+"&catalog_id=_catalog1";
});

document.getElementById('category1-catalog1').style.display = "block";
var count_cat_catalog1 = $('.content-catalog1').length;
var cat_catalog1 = [];
for(var i=1;i<=count_cat_catalog1;i++){
    cat_catalog1[i]= $('#category'.concat(i,'-catalog1 .griditem')).length;
}
var cat_now_catalog1 = cat_catalog1[1];
var viewperpage = 16;

$(function () {
    $('.view_per_page_catalog1').on('change', function () {

        var divs = document.getElementsByClassName("view_per_page_catalog1");
        for (var i = 0; i < divs.length; i++) {
            divs[i].value = $(this).val();
        }

        for(i=1;i<=count_cat_catalog1;i++){
            $('#category'.concat(i,'-catalog1 .griditem')).hide();
        }
        for(i=1;i<=count_cat_catalog1;i++){
            $('#category'.concat(i,'-catalog1 .griditem')).slice(0, this.value).slideDown();
        }

        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
        viewperpage = this.value;

        refreshPaginationCatalog1();

    });


    $('.category_select_catalog1').on('change', function () {
        var selectboxes = document.getElementsByClassName("category_select_catalog1");
        for (var i = 0; i < selectboxes.length; i++) {
            selectboxes[i].value = $(this).val();
        }

        var divs = document.getElementsByClassName("content-catalog1");
        for (i = 0; i < divs.length; i++) {
            divs[i].style.display = "none";
        }


        var divid = document.getElementById(this.value);
        divid.style.display = "block";

        refreshPaginationCatalog1();
    });

    refreshPaginationCatalog1();

});


function refreshPaginationCatalog1() {
    $('.pagination-demo-catalog1').empty();

    $('.pagination-demo-catalog1').removeData("twbs-pagination");

    $('.pagination-demo-catalog1').unbind("page");

    for(i=1;i<=count_cat_catalog1;i++) {
        if ($('#category'.concat(i,'-catalog1')).css('display') == "block") {
            cat_now_catalog1 = cat_catalog1[i];
        }
    }

    $('.pagination-demo-catalog1').twbsPagination({
        totalPages: Math.ceil(cat_now_catalog1 / viewperpage),
        visiblePages: 7,
        onPageClick: function (event, page) {
            if (page > 1) {
                for(i=1;i<=count_cat_catalog1;i++){
                    $('#category'.concat(i,'-catalog1 .griditem')).hide();
                    $('#category'.concat(i,'-catalog1 .griditem')).slice(page * viewperpage - viewperpage, page * viewperpage).show();
                }
            }
            else if (page == 1) {
                for(i=1;i<=count_cat_catalog1;i++){
                    $('#category'.concat(i,'-catalog1 .griditem')).hide();
                    $('#category'.concat(i,'-catalog1 .griditem')).slice(0, viewperpage).show();
                }
            }


        }
    });
}/**
 * Created by Edwin Albert on 6/6/2016.
 */
