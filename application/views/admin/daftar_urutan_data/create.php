<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Tambah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('DaftarUrutanData/postCreate') ?>" method="POST" autocomplete="off">
	<div class="form-group">
        <label for="txtKode">
            Kode
            <span style="color: red;">*</span>
        </label>
        
        <input type="text" name="txtKode" class="form-control" id="txtKode" required
                oninvalid="this.setCustomValidity('Kode Wajib Diisi')"
                oninput="this.setCustomValidity('')">
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