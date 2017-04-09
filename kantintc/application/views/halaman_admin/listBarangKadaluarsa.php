<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 10:10 AM
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
        <li><a href="<?php echo site_url('Main/barangAdmin')?>" class="smothscroll">Stok Barang</a></li>
        <li><a class="smothScroll">></a></li>
        <li class="active"><a href="#" class="smothScroll">Lihat List Barang</a></li>
        <li><a href="<?php echo site_url('Main/tambahStokBarang') ?>">Tambah Stok</a></li>
        <li><a class="smothScroll"></a></li>
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
            <img src="<?php echo base_url(); ?>img/kerdusmaneh.png" alt="" style="width:75px; display:inline-block">
            <table>
                <tr>

                </tr>
                <tr>
                    <td>
                        <h3 style="text-align:left display:inline-block;"><strong>List Barang</strong></h3>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <a href="<?php echo site_url('Main/listBarang')?>"><button class="btn btn-large btn-success">SEMUA BARANG</button></a>
                    </td>
                    <td style="width:25px">
                    </td>
                    <td>
                        <a href="<?php echo site_url('Main/barangKadaluarsa')?>"><button class="btn btn-large btn-success">KADALUARSA HARI INI</button></a>
                    </td>
                    <td style="width:25px">
                    </td>
                    <td>
                        <a href="<?php echo site_url('Main/barangTipis')?>"><button class="btn btn-large btn-success">STOK MENIPIS</button></a>
                    </td>
                    <td style="width:25px">
                    </td>
                    <td>
                        <a href="<?php echo site_url('Main/barangLaris')?>"><button class="btn btn-large btn-success">BERDASAR JUMLAH PENJUALAN</button></a>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div>
            <div align="center">
                <strong>List Barang yang Kadaluarsa Hari Ini</strong><br><br>
                <table class="table table-striped">
                    <?php if ($listBarangKadaluarsa->num_rows()>0)  { ?>
                        <thead>
                        <tr style="text-align:center">
                            <td style="width:250px"><p style="font-size:1.25em">Barang</p></td>
                            <td style="width:250px"><p style="font-size:1.25em">Waktu Kadaluarsa</p></td>
                        </tr>
                        </thead>
                    <?php } ?>

                    <?php if ($listBarangKadaluarsa->num_rows()==0)  { ?>
                        <h1>Kosong </h1>
                    <?php } ?>

                    <?php
                    foreach ($listBarangKadaluarsa->result() as $row) {
                        ?>

                        <tr style='text-align:center'>
                            <td style='width:250px'><p style='font-size:1em'><?php echo $row->nama_barang; ?></p></td>
                            <td style='width:250px'><p style='font-size:1em'><?php echo $row->tanggal_kadaluarsa; ?></p></td>
                        </tr>

                        <?php
                    }
                    ?>
                </table></div>
            <br>
        </div>

        <?php if ($listBarangKadaluarsa->num_rows()>0)  { ?>
            <form method="POST" action="<?php echo site_url('Main/hapusBarangKadaluarsa') ?>">
                <div align="center"><button class="btn btn-large btn-success">HAPUS BARANG KADALUARSA</button></div></form>
        <?php } ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->