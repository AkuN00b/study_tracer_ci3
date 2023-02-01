<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title2; ?></span>
</center><br>

<form action="<?php echo site_url('KonfirmasiAkun/postUpdateData') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
		<span class="mb-1">Nama</span>        
        <input type="text" value="<?= $nama; ?>" name="txtNama" class="form-control">
    </div>

    <div class="form-group">
		<span class="mb-1">Tahun Lulus</span>        
        <input type="text" value="<?= $tahun_lulus; ?>" maxlength="4" name="txtTahunLulus" class="form-control">
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