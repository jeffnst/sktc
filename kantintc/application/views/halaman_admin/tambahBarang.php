<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 9:20 AM
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
                <li><a href="<?php echo site_url('Main/laporanKeuangan') ?>">Laporan Keuangan</a></li>
                <li class="active"><a href="#" class="smothScroll">Tambah Barang</a></li>
                <li><a href="<?php echo site_url('Main/logout')?>" class="smothScroll">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<section id="desc" name="desc"></section>
<div id="intro">
    <div class="container">
        <div align="center">
            <img src="<?php echo base_url(); ?>img/pensils.png" alt="" style="width:75px; display:inline-block">
            <table>
                <tr>

                </tr>
                <tr>
                    <td>
                        <div style="width:20px"></div>
                    </td>
                    <td>
                        <h3 style="text-align:left display:inline-block;"><strong>Form Tambah Barang</strong></h3>
                    </td>
                </tr>
            </table>
        </div>

        <hr>
        <br>

        <div align="center">
            <h3>Masukkan data barang</h3>
            <form action="<?php echo site_url('Main/addBarang')?>" method="post" onsubmit="return proceed();">
                <table>
                    <tr>
                        <td style="width:100px"><label for="name1">Nama Barang</label></td>
                        <td style="width:10%"></td>
                        <td style="width:250px"><input type="name" name="nama" class="form-control"></td>
                    </tr>
                    <tr style="height:5px"></tr>
                    <tr>
                        <td style="width:100px"><label for="name1">Harga Beli</label></td>
                        <td style="width:10%"></td>
                        <td style="width:250px"><input type="text" name="beli" class="form-control"></td>
                    </tr>
                    <tr style="height:5px"></tr>
                    <tr>
                        <td style="width:100px"><label for="name1">Harga Jual</label></td>
                        <td style="width:10%"></td>
                        <td style="width:250px"><input type="text" name="jual" class="form-control"></td>
                    </tr>
                </table>
                <p><em>nb: ID barang akan tergenerate secara otomatis</em></p>
                <button class="btn btn-large btn-success">SUBMIT</button>
            </form>
        </div>

        <br>
        <br>
        <br>
        <hr>

    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<script>
    function proceed() {
        if (confirm("Apakah form telah terisi dengan benar?") == true) {
            return true;
        } else {
            alert("Mohon isi kembali");
            return false;
        }
    }
</script>