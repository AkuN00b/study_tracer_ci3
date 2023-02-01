<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('DetailPertanyaanJawaban/postCreate') ?>" method="POST" autocomplete="off">
	<div class="form-group">
		<span class="mb-1">Jawaban Kuesioner</span>
        
        <select class="form-control" name="txtJawabanKuesioner">
        	<option disabled="" selected="" value="">-- Pilih Jawaban Kuesioner --</option>
        	<?php
                foreach ($getDataJawabanKuesioner->result() as $row) {
                    echo '<option value="' . $row->id_jawabanKuesioner . '">
                    	 ' . $row->kode . ' - ' . $row->nilaiJawaban . ' - ' . $row->deskripsiJawaban . '
                    	 </option>';
                }
            ?>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Pertanyaan Turunan</span>
		
		<select class="form-control" name="txtPertanyaanTurunan">
        	<option disabled="" selected="" value="">-- Pilih Pertanyaan Turunan --</option>
        	<?php
                foreach ($getDataPertanyaanKuesionerTurunan->result() as $row) {
                    echo '<option value="' . $row->id_pku . '">
                    	 ' . $row->kode . ' - ' . $row->deskripsiPertanyaan . ' - ' . $row->jenis_kuesioner .' - ' . $row->periode . '
                    	 </option>';
                }
            ?>
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