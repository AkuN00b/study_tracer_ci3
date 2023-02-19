<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row mb-3">
	<div class="col-12">
		<a href="<?php echo site_url('JawabanKuesioner/getCreate'); ?>" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i>&nbsp;Tambah
		</a>
	</div>
</div>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">ID Pertanyaan Kuesioner</th>
				<th class="align-middle text-center">Kode Pertanyaan Kuesioner</th>
				<th class="align-middle text-center">ID Jawaban Kuesioner</th>
				<th class="">Deskripsi Jawaban</th>
				<th class="align-middle text-center">Kode Jawaban</th>
				<th class="align-middle text-center">Nilai Jawaban</th>
				<th class="align-middle text-center">Textbox?</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td>
						<?php if ($row->status == 'Tidak Aktif') { ?>
							Status Tidak Aktif
						<?php } else if ($row->status == 'Aktif') { ?>
							<a rel="tooltip" data-placement="left" title="Ubah <?php echo $title; ?>" 
							   href="<?php echo site_url('JawabanKuesioner/getEdit/'.$row->id_jawabankuesioner); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="#" data-id="<?= $row->id_jawabankuesioner; ?>" class="remove">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $row->id_pku; ?></td>
					<td><?= $row->kodepertanyaan; ?></td>
					<td><?= $row->id_jawabankuesioner; ?></td>
					<td class="text-left"><?= $row->deskripsijawaban; ?></td>
					<td>
						<?php if ($row->kode == '') { ?>
							-
						<?php } else { ?>
							<?= $row->kode; ?>
						<?php } ?>
					</td>
					<td>
						<?php if ($row->nilaijawaban == '') { ?>
							-
						<?php } else { ?>
							<?= $row->nilaijawaban; ?>
						<?php } ?>							
					</td>
					<td><?= $row->textbox; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
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
                    url: '/study-tracer/JawabanKuesioner/postDelete/' + id,
                    method: "POST"
                });

                Swal.fire({
                    title: 'Berhasil !',
                    text: '<?php echo $title; ?> dengan ID ' + id + '. Berhasil Dihapus.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('JawabanKuesioner') ?>"
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