<!DOCTYPE html>
<html>

<head>
    <?php include 'inc/head.php';?>
    <script type="text/javascript" src="js/jquery.min.js"></script>

</head>

<body class="skin-green">
    
    <?php include 'inc/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include 'sidebar-nav.php'; ?>
    </div>

    <aside class="right-side">
        <section class="content-header">
            <h1>Pengelolaan Data Lembur</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Lembur Baru</li>
            </ol>
        </section>
    
        </br>

        <div class="col-md-2">
            <!-- Small modal -->
            <div class="form-group">
                <button class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">
                    <span class="glyphicon glyphicon-plus"></span> Masukkan Data Baru
                </button>
            </div>
        </div>

        <div class="col-md-7"></div>

        <div class="col-md-3">
            <!-- search form -->
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" id="input-kode" name="q" class="form-control" placeholder="Cari NIP Pegawai..." required/>
                    <span class="input-group-btn">
                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
        </div>

        </br>

        <!-- Modal Add Item-->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Data Pegawai</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-insert-item" role="form">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip"class="form-control" placeholder="Masukkan NIP ..." required/>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lembur</label>
                                <input type="date" name="tanggal_lembur" class="form-control" rows="3" placeholder="Masukkan Tanggal Lembur ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Jam Lembur</label>
                                <input type="text" name="jumlah_jam_lembur"class="form-control" placeholder="Masukkan Jumlah Jam Lembur" required/>
                            </div>
                            <input type="hidden" name="method" value="create">

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div>
        </div>

        <!-- Ajax Tambah Item / TABEL -->
        <div id='ajax_add_item'>
            
        </div><!--/.Ajax Tambah Item -->
            
    </aside>

    <?php
       include 'inc/jq.php';
    ?>

</body>

<script type="text/javascript">
    $(document).ready(function()
    {
        // menampilkan semua list agenda saat pertama kali halaman utama diload
        $("#ajax_add_item").load("<?php echo base_url('newlist/lihat_list_paging');?>");

        // melakukan proses tambah item ketika tombol ditekan
        $('#form-insert-item').submit(function(){
            $.ajax({
                type:'POST',
                url:"<?php echo base_url('newlist/proses_list') ?>",
                data:$(this).serialize(),
                success:function (data) {
                    $('#ajax_add_item').load("<?php echo base_url('newlist/lihat_list_paging') ?>");
                    $('.bs-example-modal-sm').modal('hide');
                    $("#form-insert-item")[0].reset();
                    alert('success');
                },
                error:function (data){
                    alert("error");
                }
            });
            return false;
        });

        $('.bs-example-modal-sm').on('hidden.bs.modal', function () {
            $(".bs-example-modal-sm input[name='method']").val("create");
            $(".bs-example-modal-sm input[name='nip']").attr("readonly", true);
            $("#form-insert-item")[0].reset();
            $(".bs-example-modal-sm input[name='nip']").val(null).attr("readonly", false);
            $(".bs-example-modal-sm input[name='tanggal_lembur']").val(null);
        });

        $("#ajax_add_item").on("click", ".btn-edit", function() {
            const kode = $(this).attr("data-kode");
            $.ajax({
                type:'POST',
                url:"<?php echo base_url('newlist/show_list') ?>",
                data:{ kode: kode },
                dataType: 'JSON',
                success:function (data) {
                    if(data.list) {
                        console.log('data : ', data.list.nip);
                        $(".bs-example-modal-sm input[name='nip']").val(data.list.nip).attr("readonly", true);
                        $(".bs-example-modal-sm input[name='tanggal_lembur']").val(data.list.tanggal_lembur);
                        $(".bs-example-modal-sm input[name='jumlah_jam_lembur']").val(data.list.jumlah_jam_lembur);
                        $('.bs-example-modal-sm').modal('show');
                        $(".bs-example-modal-sm input[name='method']").val("edit");
                    }
                },
                error:function (data){
                    alert("error");
                }
            });
        })


    // melakukan proses pencarian ketika mengetikkan nama agenda
    $('#input-kode').keyup(function(){
        var nip = $('#input-kode').val();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('newlist/proses_cari_list');?>",
            data:'nip='+nip,
            success:function(html){
                $('#ajax_add_item').html(html);
            }
        });
    });



    }); //EO Javascript
</script>

</html>
