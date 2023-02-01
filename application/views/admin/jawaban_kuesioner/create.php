<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('JawabanKuesioner/postCreate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtIdJK">

	<div class="form-group">
		<span class="mb-1">Jawaban untuk Pertanyaan</span>
        
        <select class="form-control" name="txtJawabanUntukPertanyaan">
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
		<span class="mb-1">Deskripsi Jawaban</span>
        <input type="text" name="txtDeskripsiJawaban" class="form-control"></input>
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Jawaban</span>
		<input type="text" name="txtKodeJawaban" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Nilai Jawaban</span>
		<input type="text" name="txtNilaiJawaban" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Butuh Textbox?</span>
		<select class="form-control" name="txtButuhTextbox">
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