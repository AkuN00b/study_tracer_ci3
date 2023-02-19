<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Daftar Akun Tracer Study Alumni</span>
</center><br>

<div style="overflow-x: auto; width: 100%;">
	<table id="myTable" class="table table-hover grid scrollstyle text-center" width="100%">
		<thead>
			<tr>
                <th class="align-middle text-center">Aksi</th>
                <th class="align-middle text-center">Reset Kata Sandi</th>
                <th class="align-middle text-center">Update Data</th>
				<th class="align-middle text-center">No.</th>
				<th class="align-middle text-center">Nomor Induk Mahasiswa</th>
				<th class="align-middle text-center">Nomor Induk Kependudukan</th>
				<th class="">Nama Alumni</th>
				<th class="">Alamat</th>
				<th class="align-middle text-center">Tanggal Lahir</th>
				<th class="align-middle text-center">Tahun Lulus</th>
				<th class="">Email Alumni</th>
				<th class="align-middle text-center">Status Akun</th>
				<th class="align-middle text-center">Nomor Telepon</th>
			</tr>
		</thead>

		<tbody>
			<?php $no = 1; ?>

			<?php foreach ($getData->result() as $row) { ?>
				<tr style="height: 45px;">
                    <td>
                        <?php if ($row->status == 'Belum Diverifikasi') { ?>
                            <a rel="tooltip" data-placement="left" title="Terima Akun Alumni" 
                               href="#" data-id="<?= $row->id; ?>" class="approve">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </a>&nbsp;
                            <a rel="tooltip" data-placement="left" title="Tolak Akun Alumni" 
                               href="#" data-id="<?= $row->id; ?>" class="reject">
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
					<td><?= $no++; ?></td>
					<td><?= $row->nim; ?></td>
					<td><?= $row->nik; ?></td>
					<td class="text-left"><?= $row->nama; ?></td>
					<td class="text-left"><?= $row->alamat; ?></td>
					<td><?= tgl_indo($row->tanggal_lahir); ?></td>
					<td><?= $row->tahun_lulus; ?></td>
					<td class="text-left"><?= $row->email; ?></td>
					<td><?= $row->status; ?></td>
					<td><?= $row->telepon; ?></td>
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

<script type="text/javascript">
    $(".approve").click(function() {
        var id = $(this).data('id');
        console.log(id);

        Swal.fire({
            title: 'Apakah anda yakin terima akun dengan ID ' + id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
            confirmButtonText: 'Ya Terima!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/study-tracer/KonfirmasiAkun/updateDiterima/' + id,
                    method: "POST"
                });

                Swal.fire({
                    title: 'Berhasil !',
                    text: 'Akun dengan ID ' + id + '. Berhasil Diterima.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('KonfirmasiAkun') ?>"
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            	Swal.fire({
			    	title: 'Batal !',
	                text: 'Akun dengan ID ' + id + '. Batal Diterima.',
	                type: 'error',
	                icon: 'error'
			    });
            }
        });
	});

	$(".reject").click(function() {
        var id = $(this).data('id');
        console.log(id);

        Swal.fire({
            title: 'Apakah anda yakin tolak akun dengan ID ' + id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
            confirmButtonText: 'Ya Tolak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/study-tracer/KonfirmasiAkun/updateDitolak/' + id,
                    method: "POST"
                });

                Swal.fire({
                    title: 'Berhasil !',
                    text: 'Akun dengan ID ' + id + '. Berhasil Ditolak.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('KonfirmasiAkun') ?>"
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            	Swal.fire({
			    	title: 'Batal !',
	                text: 'Akun dengan ID ' + id + '. Batal Ditolak.',
	                type: 'error',
	                icon: 'error'
			    });
            }
        });
	});
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>