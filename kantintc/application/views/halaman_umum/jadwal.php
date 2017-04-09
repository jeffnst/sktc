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
                    <li class="active"><a href="#" class="smothscroll">Jadwal</a></li>
                    <li><a href="<?php echo site_url('Main/barang')?>" class="smothScroll">Barang</a></li>
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
                <img src="<?php echo base_url(); ?>img/Watches.png" alt="" style="width:75px; float:left; display:inline-block">
                <table>
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px"></div>
                        </td>
                        <td>
                            <h1 style="text-align:left display:inline-block;">Jadwal Kantin Teknik Informatika ITS</h1>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="height:20%"></div>

            <div class="row centered" style="margin-left:2%">
                <div class="col-lg-4">

                    <?php foreach($status_kantin->result() as $row) { ?>

                        <?php if ($row->Kondisi == 1)  {?>
                            Waktu saat ini:<div id="clockbox"></div>.
                            <h3>Kantin sedang buka</h3>
                            <img src="<?php echo base_url(); ?>img/oke.png" alt="" style="width:50px">
                        <?php } ?>
                        <?php if ($row->Kondisi == 0)  {?>
                            Waktu saat ini:<div id="clockbox"></div>
                            <h3>Kantin sedang tutup</h3>
                            <img src="<?php echo base_url(); ?>img/no.png" alt="" style="width:50px">
                        <?php } ?>


                    <?php } ?>

                </div>
                <div class="col-lg-4">
                    <img src="<?php echo base_url(); ?>img/sched.png" alt="" style="width:50px">
                    <h3>
                        Jadwal buka kantin
                        <p style="font-size:0.75em">
                            Senin-Kamis 09.00-17.00<br>
                            Jumat 09.00-11.30; 11.30-17.00
                        </p>
                    </h3>
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo base_url(); ?>img/stop.png" alt="" style="width:50px">
                    <h3>Kantin dapat tutup sewaktu-waktu</h3>
                </div>
            </div>

            <br>
            <hr>

            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

    <script type="text/javascript">
        function GetClock(){
            var d=new Date();
            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

            if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
            GetClock();
            setInterval(GetClock,1000);
        }
    </script>
