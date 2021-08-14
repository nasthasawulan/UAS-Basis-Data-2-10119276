<?php echo $this->pagination->create_links(); ?>

<div class="col-md-12">
     <div class="box box-warning">
         <div class="box-body no-padding">              
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Tanggal Absensi</th>
                        <th>Keterangan Absensi</th>
                        <th colspan='2'><div align="center">Action</div></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_save as $save) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $save->nip;?></td>
                            <td><?php echo $save->tanggal_absen;?></td>
                            <td><?php echo $save->keterangan_absen;?></td>
                            <td width="50"><button data-kode="<?php echo $save->nip ?>" class="btn btn-primary btn-xs btn-edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td width="50"><a href="<?php echo base_url('newsave/delete_save/'.$save->nip);?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>                                 
        </div>    
    </div>
	    <a class="btn btn-success" href="<?php echo base_url('report');?>" role="button"><i class="fa fa-file-excel-o"></i>  Export to Excel</a>
</div>

<?php echo $this->pagination->create_links(); ?>
