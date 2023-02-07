<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('DetailJenisPeriode/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
        <label for="txtJenisKuesioner">
            Jenis Kuesioner
            <span style="color: red;">*</span>
        </label>
        
        <select class="form-control" name="txtJenisKuesioner" id="txtJenisKuesioner" required
                oninvalid="this.setCustomValidity('Jenis Kuesioner Wajib Diisi')"
                oninput="this.setCustomValidity('')">
        	<option disabled="" value="">-- Pilih Jenis Kuesioner --</option>
        	<option value="Polman" <?php if ($jenis_kuesioner == 'Polman') echo "selected" ?>>Polman</option>
        	<option value="Dikti" <?php if ($jenis_kuesioner == 'Dikti') echo "selected" ?>>Dikti</option>
        </select>
    </div>

    <div class="form-group">
        <label for="txtPeriode">
            Periode
            <span style="color: red;">*</span>
        </label>

		<input type="text" name="txtPeriode" id="txtPeriode" value="<?= $periode; ?>" maxlength="4" class="form-control" required
                oninvalid="this.setCustomValidity('Periode Wajib Diisi')"
                oninput="this.setCustomValidity('')">
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