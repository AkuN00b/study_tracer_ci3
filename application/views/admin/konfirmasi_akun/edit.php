<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title2; ?></span>
</center><br>

<form action="<?php echo site_url('KonfirmasiAkun/postUpdateData') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
		<label for="txtNama">
			Nama
            <span style="color: red;">*</span>
        </label>

        <input type="text" value="<?= $nama; ?>" name="txtNama" id="txtNama" class="form-control" required
        		oninvalid="this.setCustomValidity('Nama Wajib Diisi')"
                oninput="this.setCustomValidity('')">
    </div>

    <div class="form-group">
    	<label for="txtTahunLulus">
    		Tahun Lulus
            <span style="color: red;">*</span>
        </label>

        <input type="text" value="<?= $tahun_lulus; ?>" maxlength="4" name="txtTahunLulus" id="txtTahunLulus" class="form-control"
        		oninvalid="this.setCustomValidity('Tahun Lulus Wajib Diisi')" required
                oninput="this.setCustomValidity('')">
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-1">
    	<i class="fa fa-floppy-o"></i> Reset Password
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