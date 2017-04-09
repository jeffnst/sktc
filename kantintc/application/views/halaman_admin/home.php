<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 04-Mar-17
 * Time: 8:18 PM
 */

if(!isset($_SESSION)) {
    session_save_path();
    session_start();
}
if(!isset($_COOKIE['user'])
    || !isset($_SESSION['user'])
    || $_SESSION['user']!=session_id()
    || $_SESSION['user']==NULL) {

    echo "<script>window.location.replace(\"login\");</script>";
}


?>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Selamat Datang, Admin</b></a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('Main/logout')?>" class="smothscroll"><button class="btn btn-large btn-danger"> Logout </button></a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php foreach ($notifikasi->result() as $row) { ?>

        <div>
            <?php if ($row->kadaluarsa > 0) { ?>
                <div id="notif">
                    <img src="<?php echo base_url(); ?>img/notipikasi.png" alt="" style="height:20px; display:inline-block">&nbsp;
                    <?php echo $row->kadaluarsa ?>
                    barang kadaluarsa hari ini&nbsp;<a href="<?php echo site_url('Main/barangKadaluarsa') ?>" class="smothScroll"><img src="<?php echo base_url(); ?>img/index.png" alt="" style="height:20px; display:inline-block"></a>
                </div>
            <?php } ?>

            <?php if ($row->tipis > 0) { ?>
                <div id="notif" style="margin-top:90px">
                    <img src="<?php echo base_url(); ?>img/notipikasi2.png" alt="" style="height:20px; display:inline-block">&nbsp;
                    <?php echo $row->tipis ?>
                    barang stoknya menipis&nbsp;<a href="<?php echo site_url('Main/barangTipis') ?>" class="smothScroll"><img src="<?php echo base_url(); ?>img/index.png" alt="" style="height:20px; display:inline-block"></a>
                </div>
            <?php } ?>
        </div>

    <?php } ?>

    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="row centered">
                <h1>Sistem Informasi Kantin Teknik Informatika ITS</h1>
                <br>
                <br>
                <div class="col-lg-3">
                    <img src="<?php echo base_url(); ?>img/Clipboard.png" alt="" style="width:125px">
                    <h3>Administrasi</h3>
                    <br><a href="<?php echo site_url('Main/administrasi')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
                <div class="col-lg-3">
                    <img src="<?php echo base_url(); ?>img/Kerdus.png" alt="" style="width:150px; height:125px">
                    <h3>Stok Barang</h3>
                    <br><a href="<?php echo site_url('Main/barangAdmin')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
                <div class="col-lg-3">
                    <img src="<?php echo base_url(); ?>img/Stop.png" alt="" style="width:125px">
                    <h3>Buka/Tutup Kantin</h3>
                    <br><a href="<?php echo site_url('Main/jadwalAdmin')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
                <div class="col-lg-3">
                    <img src="<?php echo base_url(); ?>img/Pocket.png" alt="" style="width:125px">
                    <h3>Transaksi</h3>
                    <br><a href="<?php echo site_url('Main/transaksi')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
            </div>

            <br>
            <hr>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div> <!--/ .container -->
    </div><!--/ #introwrap -->





