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
				<th class="align-middle text-center">ID Hasil Kuesioner</th>
				<th class="align-middle text-center">Jenis - Periode Kuesioner</th>
				<th class="align-middle text-center">NIM</th>
				<th class="align-middle text-center">Nama Alumni</th>
				<th class="align-middle text-center">Tanggal Pengisian</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($getDataHK as $row) { ?>
				<tr style="height: 45px;">
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
        $tanggal_unix = strtotime($tanggal);

		// Format tanggal ke dalam format yang diinginkan
		$tanggal = date("d", $tanggal_unix);
		$bulan = strftime("%B", $tanggal_unix);
		$tahun = date("Y", $tanggal_unix);
		$jam = date("H", $tanggal_unix);
		$menit = date("i", $tanggal_unix);
		$detik = date("s", $tanggal_unix);

		// Konversi bulan ke dalam bahasa Indonesia
		switch ($bulan) {
		    case "January":
		        $bulan = "Januari";
		        break;
		    case "February":
		        $bulan = "Februari";
		        break;
		    case "March":
		        $bulan = "Maret";
		        break;
		    case "April":
		        $bulan = "April";
		        break;
		    case "May":
		        $bulan = "Mei";
		        break;
		    case "June":
		        $bulan = "Juni";
		        break;
		    case "July":
		        $bulan = "Juli";
		        break;
		    case "August":
		        $bulan = "Agustus";
		        break;
		    case "September":
		        $bulan = "September";
		        break;
		    case "October":
		        $bulan = "Oktober";
		        break;
		    case "November":
		        $bulan = "November";
		        break;
		    case "December":
		        $bulan = "Desember";
		        break;
		}

		// Tampilkan hasil format tanggal
		return $tanggal . " " . $bulan . " " . $tahun . " " . $jam . ":" . $menit . ":" . $detik;
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