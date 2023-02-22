<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row mb-3">
	<div class="col-12">
		<h5 class="float-left" style="padding-top: 8px;">
			<?php if ($getKodePT == '') { ?>
				Kode PT: Tidak ada, 
			<?php } else { ?>
				Kode PT: <?php echo $getKodePT; ?>,
			<?php } ?>

			<a href="#" data-toggle="modal" data-target="#exampleModalCenter"> ubah disini</a>
		</h5>

		<a href="<?php echo site_url('KodeProdi/getCreate'); ?>" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i>&nbsp;Tambah
		</a>
	</div>
</div>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">Nomor Prodi</th>
				<th class="align-middle text-center">Kode Prodi</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td>
						<?php if ($row->status == 'Tidak Aktif') { ?>
							Status Tidak Aktif
						<?php } else if ($row->status == 'Aktif') { ?>
							<a rel="tooltip" data-placement="left" title="Ubah <?php echo $title; ?>" 
							   href="<?php echo site_url('KodeProdi/getEdit/'.$row->id); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="#" data-id="<?= $row->id; ?>" class="remove">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $no++; ?></td>
					<td><?= $row->prodi; ?></td>
					<td><?= $row->kode; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Isi Kode PT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('KodeProdi/postKodePT') ?>" method="POST" autocomplete="off">
			<div class="form-group">
		        <label for="txtKodePT">
		            Kode PT
		            <span style="color: red;">*</span>
		        </label>
		        
		        <input type="text" name="txtKodePT" maxlength="6" id="txtKodePT" class="form-control" required
	                oninvalid="this.setCustomValidity('Kode PT Wajib Diisi')"
	                oninput="this.setCustomValidity('')">
		    </div>

		    <button type="submit" class="btn btn-primary btn-block mb-1">
		    	<i class="fa fa-floppy-o"></i> Isi Data Kode PT
		    </button>
		</form>
      </div>
    </div>
  </div>
</div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
    $(".remove").click(function() {
        var id = $(this).data('id');
        console.log(id);

        Swal.fire({
            title: 'Apakah anda yakin menghapus <?php echo $title; ?> dengan ID ' + id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
            confirmButtonText: 'Ya Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/study-tracer/KodeProdi/postDelete/' + id,
                    method: "POST"
                });

                Swal.fire({
                    title: 'Berhasil !',
                    text: '<?php echo $title; ?> dengan ID ' + id + '. Berhasil Dihapus.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('KodeProdi') ?>"
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            	Swal.fire({
			    	title: 'Batal !',
	                text: '<?php echo $title; ?> dengan ID ' + id + '. Batal Dihapus.',
	                type: 'error',
	                icon: 'error'
			    });
            }
        });
	});
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>