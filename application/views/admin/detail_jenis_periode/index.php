<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div class="row">
	<div class="col-12">
		<a href="<?php echo site_url('DetailJenisPeriode/getCreate'); ?>" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i>&nbsp;Tambah
		</a>
	</div>
</div><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Detail Jenis Periode</th>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">Jenis Kuesioner</th>
				<th class="align-middle text-center">Periode (Tahun)</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id_detailPeriode; ?></td>
					<td>
						<?php if ($row->status == 'Tidak Aktif') { ?>
							Status Tidak Aktif
						<?php } else if ($row->status == 'Aktif') { ?>
							<a rel="tooltip" data-placement="left" title="Ubah <?php echo $title; ?>" 
							   href="<?php echo site_url('DetailJenisPeriode/getEdit/'.$row->id_detailPeriode); ?>">
	                        	<i class="fa fa-edit" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Hapus <?php echo $title; ?>" 
							   href="<?php echo site_url('DetailJenisPeriode/postDelete/'.$row->id_detailPeriode); ?>">
	                        	<i class="fa fa-trash" aria-hidden="true"></i>
	                        </a>
						<?php } ?>
					</td>
					<td><?= $row->jenis_kuesioner; ?></td>
					<td><?= $row->periode; ?></td>
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