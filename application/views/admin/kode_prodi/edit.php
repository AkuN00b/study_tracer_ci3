<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('KodeProdi/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	 <div class="form-group">
        <label for="txtProdi">
            Nomor Prodi
            <span style="color: red;">*</span>
        </label>

        <input type="number" name="txtProdi" id="txtProdi" value="<?= $prodi; ?>" class="form-control" required
                onKeyPress="if(this.value.length == 2) return false;"
                oninvalid="this.setCustomValidity('Nomor Prodi Wajib Diisi')"
                oninput="this.setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="txtKode">
            Kode Prodi
            <span style="color: red;">*</span>
        </label>

		<input type="text" name="txtKode" id="txtKode" value="<?= $kode; ?>" maxlength="5" class="form-control" required
                oninvalid="this.setCustomValidity('Kode Wajib Diisi')"
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