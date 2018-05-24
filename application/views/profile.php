<?php
/**
 * Created by PhpStorm.
 * User: Edwin Albert
 * Date: 8/14/2017
 * Time: 12:12 PM
 */

foreach($res as &$loop){
    $company_name = $loop['company_name'];
    $username = $loop['user_name'];
    $userid = $loop['user_id'];
    $companyid = $loop['company_id'];
    if ($loop['user_group_id'] == 2)
        $user_group = "Vendor";
    else if ($loop['user_group_id'] == 3)
        $user_group = "Insurance";
    else if ($loop['user_group_id'] == 4)
        $user_group = "Bank";
    else if ($loop['user_group_id'] == 1)
        $user_group = "Admin/Bouwheer";
    $useremail = $loop['user_email'];
    $userphone = $loop['user_phone'];
    $company_address = $loop['company_address'];
    $company_dppm = $loop['company_dppm'];
    $company_npwp = $loop['company_npwp'];
    $company_email = $loop['company_email'];
    $company_phone = $loop['company_phone'];
    $company_fax = $loop['company_fax'];
    $user_status = $loop['user_status'];
    $company_status = $loop['company_status'];
}
?>

<div class="container-fluid" style="background-color:#eeeeee;padding:50px;">
    <hr class="center-block blue-border">
    <span class="text-blue text-medium text-regular text-center center-block" style="margin-bottom:30px;">Profil User/PIC</span>

    <div class="box-white-big center-block" style="padding-left:10%;padding-right:10%">
        <div class="row" style="margin-bottom:20px;">
            <span class="text-blue text-bold pull-right edit-btn" id="edit1" onclick="edit(1)">edit</span>
            <span class="text-blue text-bold pull-right save-btn" id="save1">save</span>
            <span class="text-blue text-bold pull-right cancel-btn" id="cancel1" onclick="cancel(1)">cancel</span>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label class="pull-right label-form">Nama PIC</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit1" value="<?= $company_name ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Email PIC</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit1" value="<?= $useremail ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Handphone PIC</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit1" value="<?= $userphone ?>" disabled="disabled">
            </div>
        </div>
    </div>


    <hr class="center-block blue-border" style="margin-top:50px;">
    <span class="text-blue text-medium text-regular text-center center-block" style="margin-bottom:30px;">Profil Perusahaan</span>

    <div class="box-white-big center-block" style="padding-left:10%;padding-right:10%">
        <div class="row" style="margin-bottom:20px;">
            <span class="text-blue text-bold pull-right edit-btn" id="edit2" onclick="edit(2)">edit</span>
            <span class="text-blue text-bold pull-right save-btn" id="save2">save</span>
            <span class="text-blue text-bold pull-right cancel-btn" id="cancel2" onclick="cancel(2)">cancel</span>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label class="pull-right label-form">Nama Perusahaan</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_name ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Alamat</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_address ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Kab./kota</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="Kab./kota" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Provinsi</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="Provinsi" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Telepon</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_phone ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Fax</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_fax ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Email</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_email ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">NPWP</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_npwp ?>" disabled="disabled">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">DPPM</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control edit2" value="<?= $company_dppm ?>" disabled="disabled">
            </div>
        </div>
    </div>


    <hr class="center-block blue-border" style="margin-top:50px;">
    <span class="text-blue text-medium text-regular text-center center-block" style="margin-bottom:30px;">Kata Sandi</span>

    <div class="box-white-big center-block" style="padding-left:10%;padding-right:10%;padding-bottom:100px;">
        <div class="row">
            <div class="col-sm-3">
                <label class="pull-right label-form">Kata Sandi Lama</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="**********">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Kata Sandi Baru</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-3">
                <label class="pull-right label-form">Ulangi Kata Sandi Baru</label>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="">
            </div>
        </div>
        <button class="btn btn-green pull-right" style="margin-top:20px;">Simpan</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.c000001-phoenix-date').dateDropper();
        $('#transaction_table').DataTable();

    });

    function edit(i){
        $('#edit'+i).hide();
        $('#save'+i).show();
        $('#cancel'+i).show();
        if ($('.edit'+i).prop('disabled')){
            $('.edit'+i).prop('disabled', false);
        }
        else{
            $('.edit'+i).prop('disabled', true);
        }
    }
    function cancel(i){
        $('#edit'+i).show();
        $('#save'+i).hide();
        $('#cancel'+i).hide();
        if ($('.edit'+i).prop('disabled')){
            $('.edit'+i).prop('disabled', false);
        }
        else{
            $('.edit'+i).prop('disabled', true);
        }
    }

</script>