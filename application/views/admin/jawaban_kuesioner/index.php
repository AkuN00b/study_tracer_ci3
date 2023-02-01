<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row">
	<div class="col-12">
		<a href="<?php echo site_url('JawabanKuesioner/getCreate'); ?>" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i>&nbsp;Tambah
		</a>
	</div>
</div><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Pertanyaan Kuesioner</th>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">Kode Pertanyaan Kuesioner</th>
				<th class="align-middle text-center">ID Jawaban Kuesioner</th>
				<th class="align-middle text-center">Deskripsi Jawaban</th>
				<th class="align-middle text-center">Kode Jawaban</th>
				<th class="align-middle text-center">Nilai Jawaban</th>
				<th class="align-middle text-center">Textbox?</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id_pku; ?></td>
					<td>
						<?php if ($row->status == 'Tidak Aktif') { ?>
							Status Tidak Aktif
						<?php } else if ($row->status == 'Aktif') { ?>
							<a rel="tooltip" data-placement="left" title="Ubah <?php echo $title; ?>" 
							   href="<?php echo site_url('JawabanKuesioner/getEdit/'.$row->id_jawabankuesioner); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="<?php echo site_url('JawabanKuesioner/postDelete/'.$row->id_jawabankuesioner); ?>">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $row->kodepertanyaan; ?></td>
					<td><?= $row->id_jawabankuesioner; ?></td>
					<td><?= $row->deskripsijawaban; ?></td>
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

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>