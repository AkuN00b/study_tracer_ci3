<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('PertanyaanKuesioner/postCreate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtid_pku">

	<div class="form-group">
		<span class="mb-1">Deskripsi Pertanyaan</span>
        <textarea name="txtdeskripsiPertanyaan" class="form-control" rows="10"></textarea>
    </div>

    <div class="form-group">
		<span class="mb-1">Bentuk Jawaban</span>
		<select class="form-control" name="txtjenis">
        	<option disabled="" selected="" value="">-- Pilih Bentuk Jawaban --</option>
        	<option value="Combo Box">Combo Box</option>
        	<option value="Radio Button">Radio Button</option>
            <option value="Text Box">Text Box</option>
        	<option value="Text Area">Text Area</option>
        	<option value="Check Box">Check Box</option>
        	<option value="DateTime Picker">DateTime Picker</option>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Pertanyaan</span>
        <input type="text" name="txtkode" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Periode dan Jenis Kuesioner</span>
		<select class="form-control" name="txtid_detailPeriode">
        	<option disabled="" selected="" value="">-- Pilih Periode dan Jenis Kuesioner --</option>
        	<?php
                foreach ($getDataPeriodeDanJenisKuesioner as $row) {
                    echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                }
            ?>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Pertanyaan Utama?</span>
		<select class="form-control" name="txtpertanyaan_utama">
        	<option disabled="" selected="" value="">-- Pilih Apakah Pertanyaan Utama? --</option>
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