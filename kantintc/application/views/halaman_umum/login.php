<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 04-Mar-17
 * Time: 7:52 PM
 */
?>

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
                    <li><a href="<?php echo site_url('Main/barang')?>" class="smothscroll">Barang</a></li>
                    <li class="active"><a href="#" class="smothscroll">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro"  style="border-top:0px;padding-top:0px">
        <div class="container">
            <div class="row centered">
                <h1><strong>Selamat Datang di</strong></h1>
                <h2>Sistem Informasi Kantin Teknik Informatika ITS</h2>
                <br>
                <div align="center"><div class="col-lg-4">

                    </div>
                    <div class="col-lg-4" style="float:center">
                        <img src="<?php echo base_url(); ?>img/Retina-Ready.png" alt="" style="width:125px">
                        <br>
                        <h3>Silakan Login</h3>

                        <form role="form" action="<?php echo site_url('Main/cekLogin')?>" method="post" enctype="plain">
                            <div class="form-group">
                                <label for="name1">Username</label>
                                <input type="name" name="user" class="form-control" id="name1">
                            </div>
                            <div class="form-group">
                                <label for="pass1">Password</label>
                                <input type="password" name="pass" class="form-control" id="pass1">
                            </div>
                            <br>
                            <button class="btn btn-large btn-success">LOGIN</button>
                        </form>

                        <br>
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>


            </div> <!--/ .container -->
            <br>
            <hr>

            <br>

        </div><!--/ #introwrap -->

