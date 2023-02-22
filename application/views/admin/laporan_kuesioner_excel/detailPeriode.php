<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<?php if ($getData != 0) { ?>
	<button id="exportToExcel" class='btn btn-sm btn-success'>Download Laporan Kuesioner Excel</button><br><br>
	<div style="width: 100%; overflow-x: auto;">
		<table id="tableLaporan" class="table table-hover grid scrollstyle text-center" width="100%">
			<thead>
				<tr>
					<?php foreach ($getHeaderLaporan->result() as $row): ?>
						<?php if ($row->alias == ''): ?>
				    		<th class="align-middle text-center"><?= $row->kode; ?></th>
				    	<?php else : ?>
				    		<th class="align-middle text-center"><?= $row->alias; ?></th>
				    	<?php endif; ?>
				    <?php endforeach; ?>				
				</tr>
			</thead>

			<tbody>
				<?php $no = 1; ?>

				<?php foreach ($getLaporan as $row) { ?>
					<tr style="height: 45px;">
						<?php foreach ($getHeaderLaporan->result() as $row1): ?>
					    	<td data-t="s"><?php echo $row[$row1->kode]; ?></th>
					    <?php endforeach; ?>	
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php } else { ?>
	<p>Data Kuesioner Belum Terisi</p>
<?php } ?>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
	document.getElementById('exportToExcel').addEventListener('click', function() {
		TableToExcel.convert(document.getElementById("tableLaporan"), {
			name: "Laporan Kuesioner.xlsx",
		});
	});
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>