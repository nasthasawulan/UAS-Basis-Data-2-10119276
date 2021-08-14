<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include 'inc/head.php';?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <script src="https://schedule.nylas.com/schedule-editor/v1.0/schedule-editor.js" type="text/javascript"></script>
        <script src="https://unpkg.com/@nylas/components-agenda"></script>
    </head>

    <body class="skin-yellow">
        <?php
            include 'inc/header.php';
        ?>

        <?php
            if(isset($kalender)){
                echo $kalender;
            }
        ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include 'sidebar-nav.php';?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php if ($level == '1') {
                    # code...
                ?>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('pegawai');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>
                                        Data Pegawai
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="<?php echo base_url('item');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('pegawai');
                                            $this->db->where('jenis_kelamin', "Perempuan" );
                                            echo $this->db->count_all_results();
                                        ?>                                     
                                    </h3>
                                    <p>
                                        Pegawai Perempuan
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-woman"></i>
                                </div>
                                <a href="<?php echo base_url('perempuan');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('pegawai');
                                            $this->db->where('jenis_kelamin', "Laki-laki" );
                                            echo $this->db->count_all_results();
                                        ?>                                     
                                    </h3>
                                    <p>
                                        Pegawai Laki-laki
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-man"></i>
                                </div>
                                <a href="<?php echo base_url('laki');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('keterangan');
                                            echo $this->db->count_all_results();
                                        ?>                                     
                                    </h3>
                                    <p>
                                        Data Absensi
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-clock"></i>
                                </div>
                                <a href="<?php echo base_url('save');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-olive">
                                <div class="inner">
                                    <h3>
                                        <?php

                                            $this->db->select('*');
                                            $this->db->from('cuti');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>
                                        Data Cuti
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('jadwal');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        <?php

                                            $this->db->select('*');
                                            $this->db->from('lembur');
                                            
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>
                                        Data Lembur
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-clipboard"></i>
                                </div>
                                <a href="<?php echo base_url('harus');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $this->db->select_sum('total_gaji');
                                            $query = $this->db->get('gaji')->row_array();
                                            echo "Rp " . number_format($query['total_gaji'], 0, ",", ".");
                                        ?>
                                    </h3>
                                    <p>
                                        Data Penggajian
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calculator"></i>
                                </div>
                                <a href="<?php echo base_url('kalender');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                        
                        
                        
                    
                    <?php
                    }
                    elseif ($level == '2') {
                        # code...
                    }
                     ?>
                    <!-- BAGIAN PABRIK -->
                    <section class="content">
                    <?php if ($level == '1') {
                    # code...
                    ?>
                    <!-- Small boxes (Stat box) -->
                    
                    
                    </div><!-- /.row -->
                    <?php
                }
                ?>
                

                    <br>
                    <br>
                    <!-- Main row -->
                    <div class="row">
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <!-- <li class="active"><a href="#alamat-kantor" data-toggle="tab">Kantor</a></li> -->
                                    <li class="pull-left header"><i class="fa fa-tasks"></i> Deskripsi </li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <br>
                                        <h4> &nbsp; &nbsp; &nbsp; &nbsp; Website ini berfungsi untuk memudahkan penggunanya dalam mengelola data pegawai beserta proses penggajiannya. </h4>
                                        <h4> &nbsp; &nbsp; &nbsp; &nbsp; Anda juga dapat mencatat data lembur, data cuti, dan data absensi pegawai. </h4>
                                        <h4> &nbsp; &nbsp; &nbsp; &nbsp;  </h4>
                                    <br>
                                    <br>
                                </div>
                            </div><!-- /.nav-tabs-custom -->
                        </section>
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable" style="margin-top: 2rem">                            


                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#alamat" data-toggle="tab">Kantor Administrasi</a></li>
                                    <li><a href="#pembuat" data-toggle="tab"> Developer </a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Kontak</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="alamat" style="position: relative; height: 250px;">
                                        <br/>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">

                                            <?php
                                                foreach($user1->result() as $row)
                                                { ?>
                                                    <address>
                                                      <strong>My Planizer Administration (Office)</strong><br>
                                                      <?php echo $row->user_alamat; ?><br>
                                                      <?php echo $row->user_kota;  ?> <?php echo $row->user_kodepos;  ?><br>
                                                      <i class="fa fa-phone-square"></i> <?php echo $row->user_telepon;  ?>
                                                    </address>

                                                    <address>
                                                      <strong><?php echo $row->user_nama;  ?></strong><br>
                                                      <h5> IF7-10119276 </h5>
                                                      <?php echo $row->user_role;  ?><br>
                                                      <i class="fa fa-inbox"></i><a href="mailto:<?php echo $row->user_email;  ?>"> <?php echo $row->user_email;  ?></a>
                                                    </address>
                                            <?php    
                                                }
                                            ?>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="chart tab-pane" id="pembuat" style="position: relative; height: 250px;">
                                        <br/>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">

                                                    <?php
                                                    foreach($user2->result() as $row)
                                                    { ?>
    
                                                        <address>
                                                          <strong> Nasthasa Wulan Ghani Sopian </strong><br>
                                                          <h5> 10119276 </h5>
                                                          <h5> Kelas IF-7 </h5>
                                                          <i class="fa fa-inbox"> nasthasa.10119276@mahasiswa.unikom.ac.id</i><br>
                                                          <i class="fa fa-phone-square"> 0123456789 </i> 
                                                        </address>
                                                    
                                                    <?php    
                                                    }
                                                     ?>
                        
                                            </div>
                                    </div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->

                        
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include 'inc/jq.php'; ?>
        <script>
            $(document).ready(function() {
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',
                    responsive: true,
                    mainAspectRation: false,

                    // The data for our dataset
                    //data: {
                        //labels: <?php echo json_encode($chart['label']) ?>,
                        //datasets: [{
                            //label: 'your plan statistics',
                            //backgroundColor : [
                            //    "red", "green", "blue", "purple", "magenta"
                            //],
                            //borderColor: 'rgb(255, 99, 132)',
                            //data: <?php echo json_encode($chart['data']) ?>
                        //}]
                    },

                    // Configuration options go here
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                }
                            }]
                        }
                    }
                });
                chart.canvas.parentNode.style.height = '100%' ;
                chart.canvas.parentNode.style.width = '100%';
            });
        </script>
    </body>
</html>
