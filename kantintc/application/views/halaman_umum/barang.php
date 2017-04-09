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
                <a class="navbar-brand" href="<?php echo site_url('Main/home')?>"><b>Home</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('Main/jadwal')?>" class="smothScroll">Jadwal</a></li>
                    <li class="active"><a href="#" class="smothscroll">Barang</a></li>
                    <li><a href="<?php echo site_url('Main/login')?>" class="smothScroll">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="desc" name="desc"></section>

    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div>
                <img src="<?php echo base_url(); ?>img/kerdus.png" alt="" style="width:75px; float:left; display:inline-block">
                <table>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px"></div>
                        </td>
                        <td>
                            <h1 style="text-align:left display:inline-block;">Barang yang Dijual</h1>
                        </td>
                    </tr>
                </table>
            </div>


            <div>
                <div align="left">
                    <table class="table table-striped">
                        <thead>
                        <tr style="text-align:center">
                            <td style="width:250px"><p style="font-size:1.25em"><h3>Barang</h3></p></td>
                            <td style="width:250px"><p style="font-size:1.25em"><h3>Harga</h3></p></td>
                            <td style="width:250px"><p style="font-size:1.25em"><h3>Stok</h3></p></td>
                        </tr>
                        </thead>

                        <?php
                        foreach ($daftar_barang->result() as $row) {
                            ?>

                            <tr style='text-align:center'>
                                <td style='width:250px'><p style='font-size:1em'><?php echo $row->Barang; ?></p></td>
                                <td style='width:250px'><p style='font-size:1em'>Rp. <?php echo $row->Harga; ?>,-</p></td>
                                <td style='width:250px'><p style='font-size:1em'><?php echo $row->Jumlah; ?></p></td>
                            </tr>

                            <?php
                        }
                        ?>

                        <?php

                        ?>
                    </table></div>
                </br>
            </div>

            <br>
            <hr>
        </div> <!--/ .container -->
    </div><!--/ #introwrap -->
