<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar Akun Tracer Study Alumni</span>
</center><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">ID Alumni</th>
				<th class="align-middle text-center">Aksi</th>
				<th class="align-middle text-center">Reset Password</th>
				<th class="align-middle text-center">Update Data</th>
				<th class="align-middle text-center">Nomor Induk Mahasiswa</th>
				<th class="align-middle text-center">Nomor Induk Kependudukan</th>
				<th class="align-middle text-center">Nama Alumni</th>
				<th class="align-middle text-center">Alamat</th>
				<th class="align-middle text-center">Tanggal Lahir</th>
				<th class="align-middle text-center">Tahun Lulus</th>
				<th class="align-middle text-center">Email Alumni</th>
				<th class="align-middle text-center">Status Akun</th>
				<th class="align-middle text-center">Nomor Telepon</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
					<td><?= $no++; ?></td>
					<td><?= $row->id; ?></td>
					<td>
						<?php if ($row->status == 'Belum Diverifikasi') { ?>
							<a rel="tooltip" data-placement="left" title="Terima Akun Alumni" 
							   href="<?php echo site_url('KonfirmasiAkun/updateDiterima/'.$row->id); ?>">
	                        	<i class="fa fa-check" aria-hidden="true"></i>
	                        </a>&nbsp;
	                        <a rel="tooltip" data-placement="left" title="Tolak Akun Alumni" 
							   href="<?php echo site_url('KonfirmasiAkun/updateDitolak/'.$row->id); ?>">
	                        	<i class="fa fa-times" aria-hidden="true"></i>
	                        </a>
						<?php } else if ($row->status == 'Diterima') { ?>
							Alumni Diterima
						<?php } else if ($row->status == 'Ditolak') { ?>
							Alumni Ditolak
						<?php } ?>
					</td>
					<td>
						<a rel="tooltip" data-placement="left" title="Reset Password Akun Alumni" 
						   href="<?php echo site_url('KonfirmasiAkun/getResetPassword/'.$row->id); ?>">
                        	<i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
					</td>
					<td>
						<a rel="tooltip" data-placement="left" title="Update Data Akun Alumni" 
						   href="<?php echo site_url('KonfirmasiAkun/getUpdateData/'.$row->id); ?>">
                        	<i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
					</td>
					<td><?= $row->nim; ?></td>
					<td><?= $row->nik; ?></td>
					<td><?= $row->nama; ?></td>
					<td><?= $row->alamat; ?></td>
					<td><?= $row->tanggal_lahir; ?></td>
					<td><?= $row->tahun_lulus; ?></td>
					<td><?= $row->email; ?></td>
					<td><?= $row->status; ?></td>
					<td><?= $row->telepon; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>