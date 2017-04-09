<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 05-Mar-17
 * Time: 10:53 AM
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

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('Main/homeAdmin')?>" class="smothscroll">Halaman Muka</a></li>
                <li><a href="#" class="smothScroll">></a></li>
                <li><a href="<?php echo site_url('Main/administrasi') ?>">Administrasi</a></li>
                <li><a href="<?php echo site_url('Main/barangAdmin') ?>" class="smothScroll">Stok Barang</a></li>
                <li><a href="<?php echo site_url('Main/jadwalAdmin')?>" class="smothScroll">Buka/Tutup Kantin</a></li>
                <li class="active"><a href="#" class="smothScroll">Transaksi</a></li>
                <li><a href="#" class="smothScroll"></a></li>
                <li><a href="<?php echo site_url('Main/logout')?>" class="smothScroll">Logout</a></li>
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
            <h3>Masukkan data transaksi</h3>


            <form action="<?php echo site_url('Main/transaksiAddToChart')?>" method="post" onsubmit="return proceed();">
                <table>
                    <tr>
                        <?php $query = $this->db->query("call sp_id_transaksi()");?>
                        <?php foreach ($query->result() as $row) {
                            $id = $row->id;
                            $val = $row->val;
                            $query->next_result();
                            $query->free_result();?>
                            <input type='hidden' name="id" value="<?php echo $id; ?> " />
                        <?php  } ?>


                        <td style="width:100px">
                            <label for="name1">Nama Barang</label>
                        </td>
                        <td style="width:10%">

                        </td>
                        <td style="width:250px">
                            <select name="barang">
                                <?php $query2=$this->db->query("call sp_daftar_barang()");?>
                                <?php foreach ($query2->result() as $row) { ?>
                                    <option value="<?php echo $row->idbarang; ?>">
                                        <?php echo $row->Barang; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr style="height:5px"></tr>
                    <tr>
                        <td style="width:100px">
                            <label for="name1">Jumlah</label>
                        </td>
                        <td style="width:10%"></td>
                        <td style="width:250px">
                            <input type="number" name="jumlah" class="form-control" id="name1">
                        </td>
                    </tr>
                </table>


                <p>
                    <em>nb: ID transaksi akan tergenerate secara otomatis</em>
                    <br>
                    <em>&nbsp; Tanggal beli otomatis terisi tanggal kueri ini dieksekusi</em>
                </p>

                <button class="btn btn-large btn-success">BELI</button> &nbsp;&nbsp;
            </form>


            <?php if ($val == 1)  {?>
            <a href="<?php echo site_url('Main/transaksiBayar') ?>"><button class="btn btn-large btn-success" style="background-color:red; border:red">BAYAR</button></a> </div>
            <?php } ?>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
</div><!--/ #introwrap -->





<script type="text/javascript">
    var counter = 0;

    function moreFields() {
        counter++;
        var newFields = document.getElementById("readroot").cloneNode(true);
        newFields.id = '';
        newFields.style.display = 'block';
        var newField = newFields.childNodes;
        for (var i=0;i<newField.length;i++) {
            var theName = newField[i].name;
            if (theName)
                newField[i].name = theName + counter;
        }
        var insertHere = document.getElementById("writeroot");
        insertHere.parentNode.insertBefore(newFields,insertHere);
    }
</script>