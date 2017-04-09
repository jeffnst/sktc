<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 7:52 AM
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
                    <li><a href="#" class="smothScroll">></a></li>
                    <li><a href="<?php echo site_url('Main/administrasi') ?>">Administrasi</a></li>
                    <li><a href="<?php echo site_url('Main/barangAdmin') ?>" class="smothScroll">Stok Barang</a></li>
                    <li class="active"><a href="<?php echo site_url('Main/jadwalAdmin')?>" class="smothScroll">Buka/Tutup Kantin</a></li>
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
                <img src="<?php echo base_url(); ?>img/stop.png" alt="" style="width:75px; display:inline-block">
                <table>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px"></div>
                        </td>
                        <td>
                            <h3 style="text-align:left display:inline-block;"><strong>Buka/Tutup Kantin</strong></h3>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <div align="center">

                <?php foreach($statusKantin->result() as $row) { ?>

                    <?php if ($row->Kondisi == 1)  {?>
                        Status kantin saat ini:&nbsp;<div id="clockbox"></div>
                        <h3>Kantin sedang buka</h3>
                        <img src="<?php echo base_url(); ?>img/oke.png" alt="" style="width:50px">

                        <br>
                        <br>
                        <br>
                        <br>

                        <form method="POST" action="<?php echo site_url('Main/bukaTutupKantin') ?>">
                            <img src="<?php echo base_url(); ?>img/no.png" alt="" style="width:50px; display:inline-block"> &nbsp;&nbsp;&nbsp; <button class="btn btn-large btn-success">TUTUP KANTIN</button>
                        </form>

                    <?php }
                    else{ ?>
                        Status kantin saat ini:&nbsp;<div id="clockbox"></div>
                        <h3>Kantin sedang tutup</h3>
                        <img src="<?php echo base_url(); ?>img/no.png" alt="" style="width:50px">

                        <br>
                        <br>
                        <br>
                        <br>

                        <form method="POST" action="<?php echo site_url('Main/bukaTutupKantin') ?>">
                            <img src="<?php echo base_url(); ?>img/oke.png" alt="" style="width:50px; display:inline-block"> &nbsp;&nbsp;&nbsp; <button class="btn btn-large btn-success">BUKA KANTIN</button>
                        </form>

                    <?php } ?>
                <?php } ?>

            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

