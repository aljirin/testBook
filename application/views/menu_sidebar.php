
<div class="wrapper">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- sidebar -->
        <div class="column sidebar-offcanvas" id="sidebar">
            <ul class="nav" id="menu" style="padding-top:30px;">
                <li id="catalogue_management"><a href="<?= base_url() ?>index.php/main/books"><img
                                src="<?= base_url() ?>/assets/images/phoenix/dashboard-icon.png"> <span
                                class="collapse in hidden-xs">List of Books</span></a></li>
            </ul>
        </div>
        <!-- /sidebar -->

        <script>
            var url = $(location).attr('href').split("/").splice(6, 1).join("/");
            var url_sub = $(location).attr('href').split("/").splice(7, 1).join("/");
            if (url != '') {
                var d = document.getElementById(url);
                d.className += "selected";
                if (url == "transaksi") {
                    $('#item1').collapse("show");
                }
                else if (url == "pengaturanalat") {
                    $('#item2').collapse("show");
                }
                else if (url == "pengaturanlain") {
                    $('#item3').collapse("show");
                }
            }

            if (url_sub != '') {
                var e = document.getElementById(url_sub);
                e.className += "selected";
            }

            $('[data-toggle=offcanvas]').click(function () {
                $('.row-offcanvas').toggleClass('active');
//                $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
                $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
            });
        </script>