<?php
/**
 * Created by PhpStorm.
 * User: Edwin Albert
 * Date: 4/4/2017
 * Time: 1:42 PM
 */

?>

<div class="container-fluid">
    <div class="po-header">
        <a style="text-decoration: none;" href="<?=base_url()?>Main">
            <span class="text-center text-bold text-blue text-medium" style="margin-bottom:50px;margin-top:50px">PENJAMINAN <span class="text-regular">ONLINE</span></span>
        </a>

        <div class="right-header-menu pull-right">
            <a href="<?=base_url()?>index.php/main/profile" class="pull-left" style="margin-right:15px;">
                <div class="profile-picture"></div>
            </a>
            <span>Hi, <?php $session_data = $this->session->userdata('logged_in'); echo $session_data['username']; ?></span><br/>
            <a href="<?=base_url()?>Main/logout">Logout</a>
        </div>
    </div>
</div>
