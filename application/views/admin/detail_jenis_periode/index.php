<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row mb-3">
	<div class="col-12">
		<a href="<?php echo site_url('DetailJenisPeriode/getCreate'); ?>" class="btn btn-primary float-right">
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
				<th class="align-middle text-center">Jenis Kuesioner</th>
				<th class="align-middle text-center">Periode (Tahun)</th>
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
							   href="<?php echo site_url('DetailJenisPeriode/getEdit/'.$row->id_detailPeriode); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="#" data-id="<?= $row->id_detailPeriode; ?>" class="remove">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $no++; ?></td>
					<td><?= $row->jenis_kuesioner; ?></td>
					<td><?= $row->periode; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<form action="<?php echo site_url('DetailJenisPeriode/copyKuesioner') ?>" method="POST" autocomplete="off">
	<div class="row mb-3 mt-4 text-center">
		<div class="col-md-3">
			<div class="form-group">
		        <label for="txtid_detailPeriodeAsal">
		            Periode dan Jenis Kuesioner Asal
		            <span style="color: red;">*</span>
		        </label>

				<select class="form-control" name="txtid_detailPeriodeAsal" id="txtid_detailPeriodeAsal" required
		                oninvalid="this.setCustomValidity('Periode dan Jenis Kuesioner Asal Wajib Diisi')"
		                oninput="this.setCustomValidity('')">
		        	<option disabled="" selected="" value="">-- Pilih Periode dan Jenis Kuesioner Asal --</option>
		        	<?php
		                foreach ($getDataAda->result() as $row) {
		                    echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
		                }
		            ?>
		        </select>
		    </div>
		</div>

		<div class="col-md-2 mb-3" style="padding-top: 32px;">
			<h4>di-salin</h4>
		</div>

		<div class="col-md-3">
			<div class="form-group">
		        <label for="txtid_detailPeriodeKe">
		            Ke Periode dan Jenis Kuesioner
		            <span style="color: red;">*</span>
		        </label>

				<select class="form-control" name="txtid_detailPeriodeKe" id="txtid_detailPeriodeKe" required
		                oninvalid="this.setCustomValidity('Ke Periode dan Jenis Kuesioner Wajib Diisi')"
		                oninput="this.setCustomValidity('')">
		        	<option disabled="" selected="" value="">-- Pilih Ke Periode dan Jenis Kuesioner --</option>
		        	<?php
		                foreach ($getDataKosong->result() as $row) {
		                    echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
		                }
		            ?>
		        </select>
		    </div>
		</div>

		<div class="col-md-4" style="padding-top: 27px;">
			<button type="submit" class="btn btn-primary btn-block">
		    	<i class="fa fa-copy"></i> Copy Pertanyaan dan Jawaban
		    </button>
		</div>
	</div>
</form>

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
                    url: '/study-tracer/DetailJenisPeriode/postDelete/' + id,
                    method: "POST"
                });

                Swal.fire({
                    title: 'Berhasil !',
                    text: '<?php echo $title; ?> dengan ID ' + id + '. Berhasil Dihapus.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('DetailJenisPeriode') ?>"
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