<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row">
	<div class="col-12">
		<a href="<?php echo site_url('DetailPertanyaanJawaban/getCreate'); ?>" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i>&nbsp;Tambah
		</a>
	</div>
</div><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Detail Pertanyaan Jawaban</th>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">Jawaban</th>
				<th class="align-middle text-center">Pertanyaan Turunan</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id_detailpertanyaanjawaban; ?></td>
					<td>
						<?php if ($row->status == 'Tidak Aktif') { ?>
							Status Tidak Aktif
						<?php } else if ($row->status == 'Aktif') { ?>
							<a rel="tooltip" data-placement="left" title="Ubah <?php echo $title; ?>" 
							   href="<?php echo site_url('DetailPertanyaanJawaban/getEdit/'.$row->id_detailpertanyaanjawaban); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="<?php echo site_url('DetailPertanyaanJawaban/postDelete/'.$row->id_detailpertanyaanjawaban); ?>">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $row->kode; ?> - <?= $row->nilaiJawaban; ?> - <?= $row->deskripsiJawaban; ?></td>
					<td><?= $row->kodee; ?> - <?= $row->deskripsiPertanyaan; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>