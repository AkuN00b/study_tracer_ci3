<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title2; ?></span>
</center><br>

<form action="<?php echo site_url('KonfirmasiAkun/postResetPassword') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
		<label for="txtPassword">
			Kata Sandi Baru
            <span style="color: red;">*</span>
        </label>

        <input type="password" name="txtPassword" id="txtPassword" class="form-control" required
        		oninvalid="this.setCustomValidity('Kata Sandi Baru Wajib Diisi')"
                oninput="this.setCustomValidity('')">
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-1">
    	<i class="fa fa-floppy-o"></i> Reset Kata Sandi
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