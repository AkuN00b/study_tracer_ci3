<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<?php if ($getData != 0) { ?>
	<div style="width: 100%;">
		<table id="myTablee" class="table table-hover grid scrollstyle text-center" width="100%">
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
					    	<td><?php echo $row[$row1->kode]; ?></th>
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

<?php if ($getData != 0) { ?>
	<script type="text/javascript">        
	    $(document).ready(function () {
	        $('#myTablee').DataTable({
	        	dom: 'Bfrti<"bottom-wrapper"p>',
		        buttons: [
		            { extend: 'excel', 
		              className: 'btn btn-sm btn-success', 
		              text: 'Download Laporan Kuesioner Excel',
		              init: function(api, node, config) {
					  	$(node).removeClass('dt-button');
					  }, 
					}
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
<?php } else { ?>
	<script type="text/javascript">        
		$(document).ready(function () {
		    $('#myTablee').DataTable({
		    	"dom": 'lfrti<"bottom-wrapper"p>',
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
<?php } ?>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>