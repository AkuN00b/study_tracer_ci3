<?php ob_start();?>

<?php if ($getListSudahIsiC == 2 && $getListSudahIsiC + 2 == $getListKuesionerTahunIniC) { ?>
	<span style="font-size: Larger; font-weight: bold;">
		Terimakasih Telah Mengisi Kuesioner di Tahun <?php echo date('Y') ?> ini
	</span>
<?php } else { ?>
	<?php $i = 0; $detail = 'sss'; foreach ($getListKuesionerTahunIni as $row) { 
		if ($row->periode == date('Y')) {
			$data[] = array($i++ => $row->id_detailPeriode);
		}
	?>
		<?php if ($row->periode == date('Y')) { ?>
			<?php $j = 0; foreach ($getListSudahIsi as $row2) { 
				if (++$j == $i) {
					if ($row2->id_detailPeriode != $row->id_detailPeriode) { ?>
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
					<?php } else {
						if ($i == 2) {
							$detail = 'lengkap';
						}
					}
				} else {
					if ($row2->id_detailPeriode != $row->id_detailPeriode) { ?>
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
					<?php }
				}
	 ?>
			<?php 
			} if ($j == 0) { ?>
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
			<?php } else if ($detail == 'lengkap') { ?>
				<span style="font-size: Larger; font-weight: bold;">
					Terimakasih Telah Mengisi Kuesioner di Tahun <?php echo date('Y') ?> ini
				</span>
			<?php break; } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php if ($this->session->userdata('user_npwp') == NULL) { ?>
	<p><b class="text-danger">Data NPWP belum ada</b>, apakah anda sudah mempunyai data NPWP? Jika ada, <b><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Isi Disini !!</a></b></p>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Isi Data NPWP</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?php echo site_url('Alumni/postNPWP') ?>" method="POST" autocomplete="off">
				<div class="form-group">
			        <label for="txtJenisKuesioner">
			            NPWP
			            <span style="color: red;">*</span>
			        </label>
			        
			        <input type="number" name="txtNPWP" id="txtNPWP" class="form-control" required
			        	onKeyPress="if(this.value.length == 15) return false;"
		                oninvalid="this.setCustomValidity('NPWP Wajib Diisi')"
		                oninput="this.setCustomValidity('')"
		                onkeypress="allowAlphaNumericSpace(event)">
			    </div>

			    <button type="submit" class="btn btn-primary btn-block mb-1">
			    	<i class="fa fa-floppy-o"></i> Isi Data NPWP
			    </button>
			</form>
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