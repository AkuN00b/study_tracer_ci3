<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('PertanyaanKuesioner/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
		<span class="mb-1">Deskripsi Pertanyaan</span>
        <textarea name="txtdeskripsiPertanyaan" class="form-control" rows="10"><?= $deskripsipertanyaan; ?></textarea>
    </div>

    <div class="form-group">
		<span class="mb-1">Bentuk Jawaban</span>
		<select class="form-control" name="txtjenis">
        	<option disabled="" value="">-- Pilih Bentuk Jawaban --</option>
        	<option value="Combo Box" <?php if ($jenis == 'Combo Box') echo "selected" ?>>Combo Box</option>
        	<option value="Radio Button" <?php if ($jenis == 'Radio Button') echo "selected" ?>>Radio Button</option>
        	<option value="Text Box" <?php if ($jenis == 'Text Box') echo "selected" ?>>Text Box</option>
            <option value="Text Area" <?php if ($jenis == 'Text Area') echo "selected" ?>>Text Area</option>
        	<option value="Check Box" <?php if ($jenis == 'Check Box') echo "selected" ?>>Check Box</option>
        	<option value="DateTime Picker" <?php if ($jenis == 'DateTime Picker') echo "selected" ?>>DateTime Picker</option>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Pertanyaan</span>
        <input type="text" value="<?= $kode; ?>" name="txtkode" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Periode dan Jenis Kuesioner</span>
		<select class="form-control" name="txtid_detailPeriode">
        	<option disabled="" selected="" value="">-- Pilih Periode dan Jenis Kuesioner --</option>
        	<?php
                foreach ($getDataPeriodeDanJenisKuesioner as $row) {
                	if ($id_detailperiode == $row->id_detailPeriode) {
                		echo '<option value="' . $row->id_detailPeriode . '" selected="selected">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                    } else {
                        echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                    }
                }
            ?>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Pertanyaan Utama?</span>
		<select class="form-control" name="txtpertanyaan_utama">
        	<option disabled="" selected="" value="">-- Pilih Apakah Pertanyaan Utama? --</option>
        	<option value="Ya" <?php if ($pertanyaan_utama == 'Ya') echo "selected" ?>>Ya</option>
        	<option value="Tidak" <?php if ($pertanyaan_utama == 'Tidak') echo "selected" ?>>Tidak</option>
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