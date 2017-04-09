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
                <a class="navbar-brand"><b>Selamat datang</b></a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('Main/login')?>" class="smothscroll"><button class="btn btn-large btn-danger"> Login </button></a></li>
                </ul>
            </div>
        </div>
    </div>

    <section id="desc" name="desc"></section>

    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="row centered">
                <h1>Sistem Informasi Kantin Teknik Informatika ITS</h1>
                <br>
                <br>
                <div class="col-lg-6">
                    <img src="<?php echo base_url(); ?>img/Watches.png" alt="" style="width:125px">
                    <h3>Jadwal</h3>
                    <br><a href="<?php echo site_url('Main/jadwal')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo base_url(); ?>img/Kerdus.png" alt="" style="width:150px; height:125px">
                    <h3>Barang</h3>
                    <br><a href="<?php echo site_url('Main/barang')?>"><button class="btn btn-large btn-success">MASUK</button></a>
                </div>
            </div>

            <!-- garis panjang -->
            <br>
            <hr>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        </div> <!--/ .container -->
    </div><!--/ #introwrap -->


