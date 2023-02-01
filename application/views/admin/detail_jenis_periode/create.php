<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;"><?php echo $title; ?> Tambah</span>
</center><br>

<form action="<?php echo site_url('DetailJenisPeriode/postCreate') ?>" method="POST" autocomplete="off">
	<div class="form-group">
		<span class="mb-1">Jenis Kuesioner</span>
        
        <select class="form-control" name="txtJenisKuesioner">
        	<option disabled="" selected="" value="">-- Pilih Jenis Kuesioner --</option>
        	<option value="Polman">Polman</option>
        	<option value="Dikti">Dikti</option>
        </select>
    </div>

    <div class="form-group">
		<span class="mb-1">Periode</span>
		<input type="text" name="txtPeriode" maxlength="4" class="form-control">
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