<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 10:40 AM
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
                <li><a href="<?php echo site_url('Main/listBarang')?>" class="smothScroll">Lihat List Barang</a></li>
                <li class="active"><a href="<?php echo site_url('Main/tambahStokBarang') ?>">Tambah Stok</a></li>
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
            <img src="<?php echo base_url(); ?>img/trek.png" alt="" style="width:75px; display:inline-block">
            <table>
                <tr>

                </tr>
                <tr>
                    <td>
                        <div style="width:20px"></div>
                    </td>
                    <td>
                        <h3 style="text-align:left display:inline-block;"><strong>Form Tambah Stok Barang</strong></h3>
                    </td>
                </tr>
            </table>
        </div>
        <hr><br>
        <div align="center">
            <h3>Masukkan data barang</h3>
            <form action="<?php echo site_url('Main/addStock')?>" method="post"onsubmit="return proceed();">
                <table>
                    <tr>
                        <td style="width:100px"><label for="name1">Nama Barang</label></td>
                        <td style="width:10%"></td>
                        <td style="width:250px">
                            <select name="barang">
                                <?php
                                foreach ($listBarang->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->idbarang ?>"><?php echo $row->Barang ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr style="height:5px"></tr>
                    <tr>
                        <td style="width:100px"><label for="name1">Jumlah</label></td>
                        <td style="width:10%"></td>
                        <td style="width:250px"><input type="number" name="jumlah" class="form-control" id="name1"></td>
                    </tr>

                    <tr style="height:5px"></tr>
                    <tr>
                        <td style="width:100px">
                            <label for="name1">Tanggal Kadaluarsa</label>
                        </td>
                        <td style="width:10%">

                        </td>
                        <td style="width:250px">
                            <input type="date" name="tanggal" class="form-control" id="name1" placeholder="YYYY-MM-DD HH:MM">
                        <!--kalo rewel. type="date" diatas diganti "datetime" -->
                        </td>
                    </tr>
                </table>
                <p><em>nb: ID stok akan tergenerate secara otomatis</em><br>
                    <em>&nbsp; Tanggal beli otomatis terisi tanggal kueri ini dieksekusi</em></p>
                <button class="btn btn-large btn-success">SUBMIT</button>
            </form>
        </div>

        <br>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<script>
    function proceed() {
        var x;
        if (confirm("Apakah form telah terisi dengan benar?") == true) {
            return true;
        } else {
            alert("Mohon isi kembali");
            return false;
        }
    }
</script>