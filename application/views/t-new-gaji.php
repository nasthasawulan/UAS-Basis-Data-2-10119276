<?php echo $this->pagination->create_links(); ?>

<div class="col-md-12">
     <div class="box box-warning">
         <div class="box-body no-padding">              
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Kode Departemen</th>
                        <th>Kode Jabatan</th>
                        <th>Uang Makan</th>
                        <th>Uang Transport</th>
                        <th>Uang Lembur</th>
                        <th>Uang Cuti</th>
                        <th>Potongan Gaji</th>
                        <th>Tanggal Gajian</th>
                        <th>Total Gaji</th>
                        <th colspan='2'><div align="center">Action</div></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_gaji as $gaji) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $gaji->nip;?></td>
                            <td><?php echo $gaji->kd_departemen;?></td>
                            <td><?php echo $gaji->kd_jabatan;?></td>
                            <td><?php echo $gaji->uang_makan;?></td>
                            <td><?php echo $gaji->uang_transport;?></td>
                            <td><?php echo $gaji->uang_lembur;?></td>
                            <td><?php echo $gaji->uang_cuti;?></td>
                            <td><?php echo $gaji->potongan_gaji;?></td>
                            <td><?php echo $gaji->tanggal_gajian;?></td>
                            <td><?php echo $gaji->total_gaji;?></td>
                            <td width="50"><button data-kode="<?php echo $gaji->nip?>" class="btn btn-primary btn-xs btn-edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td width="50"><a href="<?php echo base_url('newgaji/delete_gaji/'.$gaji->nip);?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>                                 
        </div>    
    </div>
	    <a class="btn btn-success" href="<?php echo base_url('report');?>" role="button"><i class="fa fa-file-excel-o"></i>  Export to Excel</a>
</div>

<?php echo $this->pagination->create_links(); ?>
