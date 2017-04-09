<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 1:49 PM
 */

if(!isset($_SESSION)) {
    session_save_path();
    session_start();
}

if( !isset($_COOKIE['user'])
    || !isset($_SESSION['user'])
    || $_SESSION['user']!=session_id()
    || $_SESSION['user']==NULL) {
    echo "<script>window.location.replace(\"login\");</script>";
}
?>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('Main/homeAdmin')?>" class="smothscroll">Halaman Muka</a></li>
                <li><a class="smothScroll">></a></li>
                <li><a href="<?php echo site_url('Main/transaksi') ?>" class="smothScroll">Transaksi</a></li>
                <li><a class="smothScroll">></a></li>
                <li class="active"><a href="#" class="smothScroll">Bayar</a></li>
                <li><a class="smothScroll"></a></li>
                <li><a href="<?php echo site_url('Main/dummylogout')?>" class="smothScroll">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<section id="desc" name="desc"></section>
<div id="intro">
    <div class="container">
        <div align="center">
            <img src="<?php echo base_url(); ?>img/Pocket.png" alt="" style="width:75px; display:inline-block">
            <table>
                <tr>

                </tr>
                <tr>
                    <td>
                        <div style="width:20px"></div>
                    </td>
                    <td>
                        <h3 style="text-align:left display:inline-block;"><strong>Form Transaksi Jual Beli</strong></h3>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <br>
        <div align="center">

            <?php
            foreach ($totalBayar->result() as $row) {
                ?>
                <h3>Total Harga: <?php echo $row->total ?></h3>
            <?php } ?>
            <br>

            <br>

            <br><a href="<?php echo site_url('Main/transaksi') ?>"><button class="btn btn-large btn-success">KEMBALI KE TRANSAKSI</button></a>

        </div>
        <hr>
    </div><!--/ #introwrap -->