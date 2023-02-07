<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('JawabanKuesioner/postCreate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtIdJK">

	<div class="form-group">
        <label for="txtJawabanUntukPertanyaan">
            Jawaban untuk Pertanyaan
            <span style="color: red;">*</span>
        </label>
        
        <select class="form-control" name="txtJawabanUntukPertanyaan" id="txtJawabanUntukPertanyaan" required
                oninvalid="this.setCustomValidity('Jawaban untuk Pertanyaan Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Pertanyaan Kuesioner --</option>
        	<?php
                foreach ($getDataPertanyaanKuesioner->result() as $row) {
                    echo '<option value="' . $row->id_pku . '">
                    	 ' . $row->kode . ' - ' . $row->deskripsiPertanyaan . ' - ' . $row->jenis_kuesioner .' - ' . $row->periode . '
                    	 </option>';
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="txtDeskripsiJawaban">
            Deskripsi Jawaban
            <span style="color: red;">*</span>
        </label>

        <input type="text" name="txtDeskripsiJawaban" id="txtDeskripsiJawaban" class="form-control" required
                oninvalid="this.setCustomValidity('Deskripsi Jawaban Wajib Diisi')"
                oninput="this.setCustomValidity('')"></input>
    </div>

    <div class="form-group">
        <label for="txtKodeJawaban">
            Kode Jawaban
        </label>

		<input type="text" name="txtKodeJawaban" id="txtKodeJawaban" class="form-control">
    </div>

    <div class="form-group">
        <label for="txtNilaiJawaban">
            Nilai Jawaban
        </label>

		<input type="text" name="txtNilaiJawaban" id="txtNilaiJawaban" class="form-control">
    </div>

    <div class="form-group">
        <label for="txtButuhTextbox">
            Butuh Textbox?
            <span style="color: red;">*</span>
        </label>

		<select class="form-control" name="txtButuhTextbox" id="txtButuhTextbox" required
                oninvalid="this.setCustomValidity('Butuh Textbox? Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Butuh Textbox? --</option>
        	<option value="Ya">Ya</option>
        	<option value="Tidak">Tidak</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-1">
    	<i class="fa fa-floppy-o"></i> Tambah Data <?php echo $title; ?>
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