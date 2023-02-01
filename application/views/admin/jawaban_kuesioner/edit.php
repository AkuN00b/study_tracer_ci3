<?php ob_start(); ?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('JawabanKuesioner/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtIdJK">

	<div class="form-group">
		<span class="mb-1">Jawaban untuk Pertanyaan</span>
        
        <select class="form-control" name="txtJawabanUntukPertanyaan">
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
		<span class="mb-1">Deskripsi Jawaban</span>
        <input type="text" name="txtDeskripsiJawaban" value="<?= $deskripsiJawaban; ?>" class="form-control"></input>
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Jawaban</span>
		<input type="text" name="txtKodeJawaban" value="<?= $kode; ?>" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Nilai Jawaban</span>
		<input type="text" name="txtNilaiJawaban" value="<?= $nilaiJawaban; ?>" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Butuh Textbox?</span>
		<select class="form-control" name="txtButuhTextbox">
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