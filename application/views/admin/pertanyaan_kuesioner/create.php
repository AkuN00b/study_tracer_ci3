<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('PertanyaanKuesioner/postCreate') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtid_pku">

	<div class="form-group">
        <label for="txtdeskripsiPertanyaan">
            Deskripsi Pertanyaan
            <span style="color: red;">*</span>
        </label>

        <textarea name="txtdeskripsiPertanyaan" id="txtdeskripsiPertanyaan" class="form-control" rows="10" required
                oninvalid="this.setCustomValidity('Deskripsi Pertanyaan Wajib Diisi')"
                oninput="this.setCustomValidity('')"></textarea>
    </div>

    <div class="form-group">
        <label for="txtjenis">
            Bentuk Jawaban
            <span style="color: red;">*</span>
        </label>

		<select class="form-control" name="txtjenis" id="txtjenis" 
                oninvalid="this.setCustomValidity('Bentuk Jawaban Wajib Diisi')" required
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Bentuk Jawaban --</option>
        	<option value="Combo Box">Combo Box</option>
        	<option value="Radio Button">Radio Button</option>
            <option value="Text Box">Text Box</option>
        	<option value="Text Area">Text Area</option>
            <option value="Check Box">Check Box</option>
        	<option value="Check Box Value Berurutan">Check Box Value Berurutan</option>
        	<option value="DateTime Picker">DateTime Picker</option>
        </select>
    </div>

    <div class="form-group">
        <label for="txtkode">
            Kode Pertanyaan
        </label>

        <input type="text" name="txtkode" id="txtkode" class="form-control" required
                onkeypress="allowAlphaNumericSpace(event)">
    </div>

    <div class="form-group">
        <label for="txtid_detailPeriode">
            Periode dan Jenis Kuesioner
            <span style="color: red;">*</span>
        </label>

		<select class="form-control" name="txtid_detailPeriode" id="txtid_detailPeriode" required
                oninvalid="this.setCustomValidity('Periode dan Jenis Kuesioner Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Periode dan Jenis Kuesioner --</option>
        	<?php
                foreach ($getDataPeriodeDanJenisKuesioner as $row) {
                    echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="txtpertanyaan_utama">
            Pertanyaan Utama?
            <span style="color: red;">*</span>
        </label>

		<select class="form-control" name="txtpertanyaan_utama" id="txtpertanyaan_utama" required
                oninvalid="this.setCustomValidity('Pertanyaan Utama? Wajib Diisi')"
                oninput="this.setCustomValidity('')">
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