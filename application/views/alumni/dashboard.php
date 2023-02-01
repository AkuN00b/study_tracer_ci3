<?php ob_start();?>

<?php foreach ($getListKuesionerTahunIni as $row) { ?>
	<div id="accordion<?= $row->id_detailPeriode?>" class="mb-4" role="tablist" aria-multiselectable="true">
	    <div class='card'>
	    	<div class='card-header' role='tab' id='0'>
	    		<h5 class='mb-0'>
	    			<a class='collapsed' data-toggle='collapse' data-parent='#accordion<?= $row->id_detailPeriode?>' href='#app<?= $row->id_detailPeriode?>0' aria-expanded='true' aria-controls='app<?= $row->id_detailPeriode?>0'><?= $row->jenis_kuesioner?> - <?= $row->periode?></a>
	    		</h5>
	    	</div>

	    	<div id='app<?= $row->id_detailPeriode?>0' class='collapse' role='tabpanel' aria-labelledby='0'>
	    		<div class='card-block'>
	    			<div class='list-group'>
	    				<a href='<?php echo site_url('Alumni/kuesioner/'.$row->id_detailPeriode); ?>' class='list-group-item list-group-item-action'>
		    				Isi Kuesioner <?= $row->jenis_kuesioner?> - <?= $row->periode?> sebagai ALUMNI
		    			</a>
		    		</div>
		    	</div>
		    </div>
		</div>
	</div>
<?php } ?>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<?php
	$script = ob_get_clean();
	include('application/views/template_alumni.php');
	ob_flush();
?>