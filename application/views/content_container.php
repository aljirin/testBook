
<!-- main right col -->
</p>
<div class="container-fluid directory-container">
    <span>
        <?php
        echo($direktori);
        ?>
    </span>
</div>
<div class="right-view-content center-block">
    <?php
    if ($this->uri->segment(5) != '' && $this->uri->segment(5) != 'edit') {
        $this->load->view($page . "/$page_sub" . "_detail_detail");
    } else if ($this->uri->segment(4) != '') {
        $this->load->view($page . "/$page_sub" . "_detail");
    } else if ($this->uri->segment(3) != '') {
        $this->load->view($page . "/" . $page_sub);
    } else if ($this->uri->segment(2) == 'view_addBook') {
        $this->load->view("books/" . $page);
    } else if ($this->uri->segment(2) == 'books') {
        $this->load->view($page . "/" . $page);
    } else {

    }
    ?>
</div>
</div>
<!-- /main -->

</div>
</div>