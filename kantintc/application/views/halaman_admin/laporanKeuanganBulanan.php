<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 9:02 AM
 */

if(!isset($_SESSION)){
    session_save_path();
    session_start();
}
if( !isset($_COOKIE['user'])
    || !isset($_SESSION['user'])
    || $_SESSION['user']!=session_id()
    || $_SESSION['user']==NULL){
    echo "<script>window.location.replace(\"login\");</script>";
    //header("location:Login.php");
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

            <strong>Bulan
                <?php
                if ($_POST['bulan'] == 1) echo 'Januari';
                if ($_POST['bulan'] == 2) echo 'Februari';
                if ($_POST['bulan'] == 3) echo 'Maret';
                if ($_POST['bulan'] == 4) echo 'April';
                if ($_POST['bulan'] == 5) echo 'Mei';
                if ($_POST['bulan'] == 6) echo 'Juni';
                if ($_POST['bulan'] == 7) echo 'Juli';
                if ($_POST['bulan'] == 8) echo 'Agustus';
                if ($_POST['bulan'] == 9) echo 'September';
                if ($_POST['bulan'] == 10) echo 'Oktober';
                if ($_POST['bulan'] == 11) echo 'November';
                if ($_POST['bulan'] == 12) echo 'Desember';
                ?>
            </strong>

            <?php
            $angka=$_POST['bulan'];
            $query=$this->db->query("call sp_laporan_keuntungan($angka)");

            foreach ($query->result() as $row) {?>
            <table align="center">
                <tr>
                    <td style="width:300px"><p style="font-size:1.25em">Pemasukan total</p></td>
                    <td style='width:100px'>
                        <p style='font-size:1em'>
                            Rp.
                            <?php
                            echo $row->Penjualan;
                            ?>
                            ,-
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px"><p style="font-size:1.25em">Pengeluaran total</p></td>
                    <td style='width:100px'>
                        <p style='font-size:1em'>
                            Rp.
                            <?php
                            echo $row->Pembelian;
                            ?>
                            ,-
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:300px; height:1px; background-color:#2F2F2F"></td>
                </tr>
                <tr>
                    <td style="width:300px"><p style="font-size:1.25em">Keuntungan</p></td>
                    <td style='width:100px'>
                        <p style='font-size:1em'>
                            Rp.
                            <?php
                            echo $row->Keuntungan;
                            }
                            ?>
                            ,-
                        </p>
                    </td>
                </tr>
            </table>
            <br><br>
            <div align="center">
                <a href="<?php echo site_url('Main/barangAdmin')?>"><button class="btn btn-large btn-success">LIHAT STOK</button></a>
                &nbsp; &nbsp; &nbsp;
                <a href="<?php echo site_url('Main/laporanKeuangan')?>"><button class="btn btn-large btn-success">KEMBALI</button></a>
            </div>
        </div>

        <br>
        <br>
        <br>
        <hr>
        <br>

    </div> <!--/ .container -->
</div><!--/ #introwrap -->
