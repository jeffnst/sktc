<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 8:55 AM
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
                    <li><a href="<?php echo site_url('Main/administrasi')?>" class="smothscroll">Administrasi</a></li>
                    <li><a class="smothScroll">></a></li>
                    <li class="active"><a href="#">Laporan Keuangan</a></li>
                    <li><a href="<?php echo site_url('Main/tambahBarang') ?>" class="smothScroll">Tambah Barang</a></li>
                    <li><a href="#" class="smothScroll"></a></li>

                    <li><a class="smothScroll"></a></li>
                    <li><a class="smothScroll"></a></li>
                    <li><a class="smothScroll"></a></li>
                    <li><a class="smothScroll"></a></li>
                    <li><a class="smothScroll"></a></li>
                    <li><a class="smothScroll"></a></li>


                    <li><a href="<?php echo site_url('Main/logout')?>" class="smothScroll">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div align="center">
                <img src="<?php echo base_url(); ?>img/laporan.png" alt="" style="width:75px; height:100px; display:inline-block">
                <table>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px"></div>
                        </td>
                        <td>
                            <h3 style="text-align:left display:inline-block;"><strong>Laporan Keuangan Kantin Teknik Informatika ITS</strong></h3>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>

            <div align="center">

                <strong>Laporan Keuangan Bulan</strong>

                <?php //echo form_open('Main/laporan'); ?>
                <form method="POST" action="<?php echo site_url('Main/laporanKeuangan') ?>">
                    <select name="bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <br><br>
                    <button class="btn btn-large btn-success">Lihat</button>
                </form>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <hr>

                <br>

            </div> <!--/ .container -->
        </div><!--/ #introwrap -->
