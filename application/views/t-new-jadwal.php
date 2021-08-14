<?php echo $this->pagination->create_links(); ?>

<div class="col-md-12">
     <div class="box box-warning">
         <div class="box-body no-padding">              
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Jumlah Hari</th>
                        <th>Keterangan</th>
                        <th colspan='2'><div align="center">Action</div></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_jadwal as $jadwal) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $jadwal->nip;?></td>
                            <td><?php echo $jadwal->dari_tanggal;?></td>
                            <td><?php echo $jadwal->sampai_tanggal;?></td>
                            <td><?php echo $jadwal->jumlah_hari;?></td>
                            <td><?php echo $jadwal->keterangan;?></td>
                            <td width="50"><button data-kode="<?php echo $jadwal->nip ?>" class="btn btn-primary btn-xs btn-edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td width="50"><a href="<?php echo base_url('newschedule/delete_jadwal/'.$jadwal->nip);?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>                                 
        </div>    
    </div>
	    <a class="btn btn-success" href="<?php echo base_url('report');?>" role="button"><i class="fa fa-file-excel-o"></i>  Export to Excel</a>
</div>

<?php echo $this->pagination->create_links(); ?>
