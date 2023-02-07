<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTablee" class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Hasil Kuesioner</th>
				<th class="align-middle text-center">Jawaban Kuesioner</th>
				<th class="align-middle text-center">Kode</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id_hasilKuesioner; ?></td>
					<td><?= $row->jawabanKuesioner; ?></td>
					<td><?= $row->kode; ?></td>
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
    $(document).ready(function () {
        $('#myTablee').DataTable({
        	dom: 'Bfrtip',
	        buttons: [
	            'excel'
	        ],
            "language": {
                "emptyTable": "Tidak ada Data <?php echo $title; ?>"
            },
            scrollX: true,
            "bLengthChange": false,
            "bInfo": false,
            "pageLength": 10,
        });
    });
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>