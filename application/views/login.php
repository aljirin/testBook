<?php
/**
 * Created by PhpStorm.
 * User: Edwin Albert
 * Date: 2/6/2018
 * Time: 1:56 PM
 */ ?>

<img src="<?=base_url()?>assets/images/pasarsentuh/admin_logo.png" class="center-block" style="margin-top:40px;margin-bottom:40px;">
<div class="box-white center-block">
    <form action="<?php echo base_url(); ?>auth/auth" method="post" id="validation-form" class="form-horizontal" role="form">
        <p class="label-grey">User Name</p>
        <input type="text" name="username" id="username" class="form-control form-gabung" placeholder="">

        <p class="label-grey">Password</p>
        <input type="password" name="password" id="password" class="form-control form-gabung" placeholder="" style="margin-bottom:10px;">
        <a href="" class="label-grey">Forgot Password?</a>

        <a href="<?=base_url()?>/main/dashboard">
            <button class="btn btn-blue">Log in</button>
        </a>
    </form>
</div>