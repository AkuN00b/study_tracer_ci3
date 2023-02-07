<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('DetailPertanyaanJawaban/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtID">

	<div class="form-group">
        <label for="txtJawabanKuesioner">
            Jawaban Kuesioner
            <span style="color: red;">*</span>
        </label>
        
        <select class="form-control" name="txtJawabanKuesioner" id="txtJawabanKuesioner" required
                oninvalid="this.setCustomValidity('Jawaban Kuesioner Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Jawaban Kuesioner --</option>
        	<?php
                foreach ($getDataJawabanKuesioner->result() as $row) {
                	if ($id_jawabanKuesioner == $row->id_jawabanKuesioner) {
                		echo '<option value="' . $row->id_jawabanKuesioner . '" selected="selected">
                    	 ' . $row->kode . ' - ' . $row->nilaiJawaban . ' - ' . $row->deskripsiJawaban . '
                    	 </option>';
                	} else {
                		echo '<option value="' . $row->id_jawabanKuesioner . '">
                    	 ' . $row->kode . ' - ' . $row->nilaiJawaban . ' - ' . $row->deskripsiJawaban . '
                    	 </option>';
                	}	
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="txtPertanyaanTurunan">
            Pertanyaan Turunan
            <span style="color: red;">*</span>
        </label>
		
		<select class="form-control" name="txtPertanyaanTurunan" id="txtPertanyaanTurunan" required
                oninvalid="this.setCustomValidity('Pertanyaan Turunan Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Pertanyaan Turunan --</option>
        	<?php
                foreach ($getDataPertanyaanKuesionerTurunan->result() as $row) {
                	if ($id_pku_answer == $row->id_pku) {
                		echo '<option value="' . $row->id_pku . '" selected="selected">
                    	 ' . $row->kode . ' - ' . $row->deskripsiPertanyaan . ' - ' . $row->jenis_kuesioner .' - ' . $row->periode . '
                    	 </option>';
                	} else {
                		echo '<option value="' . $row->id_pku . '">
                    	 ' . $row->kode . ' - ' . $row->deskripsiPertanyaan . ' - ' . $row->jenis_kuesioner .' - ' . $row->periode . '
                    	 </option>';
                	}
                }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-1">
    	<i class="fa fa-floppy-o"></i> Ubah Data <?php echo $title; ?>
    </button>
</form>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>