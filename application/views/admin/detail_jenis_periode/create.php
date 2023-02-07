<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('DetailJenisPeriode/postCreate') ?>" method="POST" autocomplete="off">
	<div class="form-group">
        <label for="txtJenisKuesioner">
            Jenis Kuesioner
            <span style="color: red;">*</span>
        </label>
        
        <select class="form-control" name="txtJenisKuesioner" id="txtJenisKuesioner" required
                oninvalid="this.setCustomValidity('Jenis Kuesioner Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" selected="" value="">-- Pilih Jenis Kuesioner --</option>
        	<option value="Polman">Polman</option>
        	<option value="Dikti">Dikti</option>
        </select>
    </div>

    <div class="form-group">
        <label for="txtPeriode">
            Periode
            <span style="color: red;">*</span>
        </label>
		
		<input type="text" name="txtPeriode" maxlength="4" class="form-control" id="txtPeriode" required
                oninvalid="this.setCustomValidity('Periode Wajib Diisi')"
                oninput="this.setCustomValidity('')">
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