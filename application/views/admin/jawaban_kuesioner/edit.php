<?php ob_start(); ?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('JawabanKuesioner/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtIdJK">

	<div class="form-group">
        <label for="txtJawabanUntukPertanyaan">
            Jawaban untuk Pertanyaan
            <span style="color: red;">*</span>
        </label>

        <select class="form-control" name="txtJawabanUntukPertanyaan" id="txtJawabanUntukPertanyaan" required
                oninvalid="this.setCustomValidity('Jawaban untuk Pertanyaan Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" value="">-- Pilih Pertanyaan Kuesioner --</option>
        	<?php
                foreach ($getDataPertanyaanKuesioner->result() as $row) {
                	if ($id_pku == $row->id_pku) {
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

    <div class="form-group">
        <label for="txtDeskripsiJawaban">
            Deskripsi Jawaban
            <span style="color: red;">*</span>
        </label>

        <input type="text" name="txtDeskripsiJawaban" id="txtDeskripsiJawaban" value="<?= $deskripsiJawaban; ?>" class="form-control"
                oninvalid="this.setCustomValidity('Deskripsi Jawaban Wajib Diisi')" required
                oninput="this.setCustomValidity('')"></input>
    </div>

    <div class="form-group">
        <label for="txtKodeJawaban">
            Kode Jawaban
        </label>

		<input type="text" name="txtKodeJawaban" id="txtKodeJawaban" value="<?= $kode; ?>" class="form-control" 
                onkeypress="allowAlphaNumericSpace(event)">
    </div>

    <div class="form-group">
        <label for="txtNilaiJawaban">
            Nilai Jawaban
        </label>

		<input type="text" name="txtNilaiJawaban" id="txtNilaiJawaban" value="<?= $nilaiJawaban; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="txtButuhTextbox">
            Butuh Textbox?
            <span style="color: red;">*</span>
        </label>

		<select class="form-control" name="txtButuhTextbox" id="txtButuhTextbox" required
                oninvalid="this.setCustomValidity('Butuh Textbox? Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" value="">-- Pilih Butuh Textbox? --</option>
        	<option value="Ya" <?php if ($textbox == 'Ya') echo "selected" ?>>Ya</option>
        	<option value="Tidak" <?php if ($textbox == 'Tidak') echo "selected" ?>>Tidak</option>
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