<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Ubah <?php echo $title; ?></span>
</center><br>

<form action="<?php echo site_url('DaftarUrutanData/postUpdate') ?>" method="POST" autocomplete="off">
	<input type="hidden" name="txtID" value="<?= $id; ?>" class="form-control">

	<div class="form-group">
        <label for="txtKode">
            Kode
            <span style="color: red;">*</span>
        </label>
        
        <input type="text" name="txtKode" id="txtKode" value="<?= $kode; ?>" class="form-control" required
                oninvalid="this.setCustomValidity('Kode Wajib Diisi')"
                oninput="this.setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="txtAlias">
            Alias
            <span style="color: red;">*</span>
        </label>
        
        <input type="text" name="txtAlias" id="txtAlias" value="<?= $alias; ?>" class="form-control" required
                oninvalid="this.setCustomValidity('Alias Wajib Diisi')"
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
                    if ($id_detailPeriode == $row->id_detailPeriode) {
                        echo '<option value="' . $row->id_detailPeriode . '" selected="selected">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                    } else {
                        echo '<option value="' . $row->id_detailPeriode . '">' . $row->jenis_kuesioner . ' - ' . $row->periode . '</option>';
                    }
                }
            ?>
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