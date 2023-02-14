<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar <?php echo $title; ?></span>
</center><br>

<?php foreach ($dataHasilKuesioner->result() as $row) { ?>
	<h5>
		<a href="<?php echo site_url('LaporanKuesionerExcel/detailPeriode/'.$row->id_detailPeriode); ?>">
			Lihat Data Kuesioner <?= $row->jenis_kuesioner ?> - <?= $row->periode ?>
		</a>
	</h5>
<?php } ?>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Hasil Kuesioner</th>
				<th class="align-middle text-center">Jenis - Periode Kuesioner</th>
				<th class="align-middle text-center">NIM</th>
				<th class="align-middle text-center">Nama Alumni</th>
				<th class="align-middle text-center">Tanggal Pengisian</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getDataHK as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id_hasilKuesioner; ?></td>
					<td><?= $row->jenis_kuesioner; ?> - <?= $row->periode; ?></td>
					<td><?= $row->nim; ?></td>
					<td><?= $row->created_by; ?></td>
					<td><?= tgl_indo($row->tanggal_pengisian); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>