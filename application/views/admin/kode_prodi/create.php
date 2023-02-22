<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('KodeProdi/postCreate') ?>" method="POST" autocomplete="off">
	<div class="form-group">
        <label for="txtProdi">
            Nomor Prodi
            <span style="color: red;">*</span>
        </label>
        
        <input type="number" name="txtProdi" class="form-control" id="txtProdi" required
                onKeyPress="if(this.value.length == 2) return false;"
                oninvalid="this.setCustomValidity('Nomor Prodi Wajib Diisi')"
                oninput="this.setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="txtKode">
            Kode Prodi
            <span style="color: red;">*</span>
        </label>
		
		<input type="text" name="txtKode" maxlength="5" class="form-control" id="txtKode" required
                oninvalid="this.setCustomValidity('Kode Wajib Diisi')"
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