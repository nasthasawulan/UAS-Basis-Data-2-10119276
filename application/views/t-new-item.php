<?php echo $this->pagination->create_links(); ?>

<div class="col-md-12">
     <div class="box box-warning">
         <div class="box-body no-padding">              
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th colspan='2'><div align="center">Action</div></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar_item as $item) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $item->nip;?></td>
                            <td><?php echo $item->nama_pegawai;?></td>
                            <td><?php echo $item->tempat_lahir;?></td>
                            <td><?php echo $item->tanggal_lahir;?></td>
                            <td><?php echo $item->jenis_kelamin;?></td>
                            <td><?php echo $item->agama;?></td>
                            <td><?php echo $item->alamat;?></td>
                            <td><?php echo $item->no_telepon;?></td>
                            <td width="50"><button data-kode="<?php echo $item->nip ?>" class="btn btn-primary btn-xs btn-edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td width="50"><a href="<?php echo base_url('newitem/delete_item/'.$item->nip);?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>                                 
        </div>    
    </div>
	    <a class="btn btn-success" href="<?php echo base_url('report');?>" role="button"><i class="fa fa-file-excel-o"></i>  Export to Excel</a>
</div>

<?php echo $this->pagination->create_links(); ?>
