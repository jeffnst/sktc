<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 9:44 AM
 */

if(!isset($_SESSION)) {
    session_save_path();
    session_start();
}
if( !isset($_COOKIE['user'])
    || !isset($_SESSION['user'])
    || $_SESSION['user']!=session_id()
    || $_SESSION['user']==NULL){
    echo "<script>window.location.replace(\"login\");</script>";
}
?>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('Main/homeAdmin')?>" class="smothscroll">Halaman Muka</a></li>
                <li><a class="smothScroll">></a></li>
                <li><a href="<?php echo site_url('Main/administrasi') ?>">Administrasi</a></li>
                <li class="active"><a href="#" class="smothScroll">Stok Barang</a></li>
                <li><a href="<?php echo site_url('Main/jadwalAdmin')?>" class="smothScroll">Buka/Tutup Kantin</a></li>
                <li><a href="<?php echo site_url('Main/transaksi') ?>" class="smothScroll">Transaksi</a></li>
                <li><a href="#" class="smothScroll"></a></li>
                <li><a href="<?php echo site_url('Main/logout')?>" class="smothScroll">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div align="center">
            <img src="<?php echo base_url(); ?>img/Kerdus.png" alt="" style="width:75px; display:inline-block">
            <table>
                <tr>

                </tr>
                <tr>
                    <td>
                        <div style="width:20px"></div>
                    </td>
                    <td>
                        <h3 style="text-align:left display:inline-block;"><strong>Stok Barang Kantin Teknik Informatika ITS</strong></h3>
                    </td>
                </tr>
            </table>
        </div>
        <hr>

        <div style="height:5%"></div>

        <div class="row centered">
            <div class="col-lg-6">
                <img src="<?php echo base_url(); ?>img/kerdusmaneh.png" alt="" style="height:125px">
                <h3>Lihat List Barang</h3>
                <br><a href="<?php echo site_url('Main/listBarang')?>"><button class="btn btn-large btn-success">MASUK</button></a>
            </div>
            <div class="col-lg-6">
                <img src="<?php echo base_url(); ?>img/trek.png" alt="" style="height:125px">
                <h3>Tambah Stok Barang</h3>
                <br><a href="<?php echo site_url('Main/tambahStokBarang')?>"><button class="btn btn-large btn-success">MASUK</button></a>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->
