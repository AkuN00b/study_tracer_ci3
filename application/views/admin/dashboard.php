<?php ob_start();?>

<div class="row">
	<div class="col-md-6 col-sm-12" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
	  	<div class="card card-stats mb-4 p-3" style="border-radius: 10px;">
	    	<div class="card-body">
	      		<div class="row">
	        		<div class="col">
	          			<h5 class="card-title text-uppercase text-muted mb-0">Pertanyaan Kuesioner</h5>
	          			<span class="h2 font-weight-bold mb-0 num" data-val="<?= $getCountPK ?>">0</span>
	        		</div>
	      		</div>

		      	<p class="mt-3 mb-0 text-muted text-sm">
		        	<a href='<?php echo site_url('PertanyaanKuesioner'); ?>' data-toggle="tooltip" data-placement="bottom"data-original-title="Lihat Pertanyaan Kuesioner">
		        		<span class="mr-2">
		        			<i class="fa fa-arrow-circle-right"></i> Pertanyaan Kuesioner
		        		</span>
		        	</a>
		      	</p>
		    </div>
	  	</div>
	</div>

	<div class="col-md-6 col-sm-12" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
	  	<div class="card card-stats mb-4 p-3" style="border-radius: 10px;">
	    	<div class="card-body">
	      		<div class="row">
	        		<div class="col">
	         			<h5 class="card-title text-uppercase text-muted mb-0">Jawaban Kuesioner</h5>
	          			<span class="h2 font-weight-bold mb-0 num" data-val="<?= $getCountJK ?>">0</span>
	        		</div>
			    </div>

			    <p class="mt-3 mb-0 text-muted text-sm">
			    	<a href='<?php echo site_url('JawabanKuesioner'); ?>' data-toggle="tooltip" data-placement="bottom"data-original-title="Lihat Jawaban Kuesioner">
		        		<span class="mr-2">
		        			<i class="fa fa-arrow-circle-right"></i> Jawaban Kuesioner
		        		</span>
		        	</a>
			    </p>
	    	</div>
	  	</div>
	</div>

	<div class="col-md-6 col-sm-12" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
		<div class="card card-stats mb-4 p-3" style="border-radius: 10px;">
		    <div class="card-body">
		      	<div class="row">
		        	<div class="col">
		          		<h5 class="card-title text-uppercase text-muted mb-0">Detail Jenis Periode</h5>
		          		<span class="h2 font-weight-bold mb-0 num" data-val="<?= $getCountDJP ?>">0</span>
		        	</div>
			    </div>

			    <p class="mt-3 mb-0 text-muted text-sm">
			        <a href='<?php echo site_url('DetailJenisPeriode'); ?>' data-toggle="tooltip" data-placement="bottom"data-original-title="Lihat Detail Jenis Periode">
		        		<span class="mr-2">
		        			<i class="fa fa-arrow-circle-right"></i> Detail Jenis Periode
		        		</span>
		        	</a>
			    </p>
		    </div>
		</div>
	</div>

	<div class="col-md-6 col-sm-12" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
	  	<div class="card card-stats mb-4 p-3" style="border-radius: 10px;">
		    <div class="card-body">
		      	<div class="row">
		        	<div class="col">
		          		<h5 class="card-title text-uppercase text-muted mb-0">Detail Pertanyaan Jawaban</h5>
		          		<span class="h2 font-weight-bold mb-0 num" data-val="<?= $getCountDPJ ?>">0</span>
		        	</div>
		      	</div>

		      	<p class="mt-3 mb-0 text-muted text-sm">
			        <a href='<?php echo site_url('DetailPertanyaanJawaban'); ?>' data-toggle="tooltip" data-placement="bottom"data-original-title="Lihat Detail Pertanyaan Jawaban">
		        		<span class="mr-2">
		        			<i class="fa fa-arrow-circle-right"></i> Detail Pertanyaan Jawaban
		        		</span>
		        	</a>
			    </p>
		    </div>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-12 mb-4 justify-content-center" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
		<center>
			<span style="font-size: Larger; font-weight: bold;">Data Alumni Berdasarkan Tahun</span><br><br>
		</center>

		<canvas id="myChartBar"></canvas>
	</div>

	<div class="col-lg-6 col-md-12 mb-4 justify-content-center" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
		<center>
			<span style="font-size: Larger; font-weight: bold;">Akun Yang Belum Diverifikasi</span><br><br>
		</center>

		<div style="overflow-x: auto; width: 100%;">
			<table class="table table-hover table-bordered table-condensed table-striped grid scrollstyle text-center" width="100%">
				<thead>
					<tr>
						<th class="align-middle text-center">Aksi</th>
						<th class="align-middle text-center">Nomor Induk Mahasiswa</th>
						<th class="text-left">Nama Alumni</th>
						<th class="align-middle text-center">Tahun Lulus</th>
					</tr>
				</thead>

				<tbody>
					<?php $no = 1; ?>

					<?php foreach ($getData->result() as $row) { ?>
						<tr style="height: 45px;">
							<td>
								<?php if ($row->status == 'Belum Diverifikasi') { ?>
									<a rel="tooltip" data-placement="left" title="Terima Akun Alumni" 
									   href="#" data-id="<?= $row->id; ?>" data-nim="<?= $row->nim; ?>" class="approve">
			                        	<i class="fa fa-check" aria-hidden="true"></i>
			                        </a>&nbsp;
			                        <a rel="tooltip" data-placement="left" title="Tolak Akun Alumni" 
									   href="#" data-id="<?= $row->id; ?>" data-nim="<?= $row->nim; ?>" class="reject">
			                        	<i class="fa fa-times" aria-hidden="true"></i>
			                        </a>
								<?php } else if ($row->status == 'Diterima') { ?>
									Alumni Diterima
								<?php } else if ($row->status == 'Ditolak') { ?>
									Alumni Ditolak
								<?php } ?>
							</td>
							<td><?= $row->nim; ?></td>
							<td class="text-left"><?= $row->nama; ?></td>
							<td><?= $row->tahun_lulus; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-lg-6 col-md-12 mb-4 justify-content-center" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
		<center>
			<span style="font-size: Larger; font-weight: bold;">Data Alumni Besertakan Status</span><br><br>
		</center>

		<center><canvas id="myChartDoughnut"></canvas></center>
	</div>

	<div class="col-lg-6 col-md-12 mb-4 justify-content-center" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="690">
		<center>
			<span style="font-size: Larger; font-weight: bold;">Data Kuesioner Terisi Berdasarkan Jenis Kuesioner</span><br><br>
		</center>

		<center><canvas id="myChartPie"></canvas></center>
	</div>
</div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
	const ctx = document.getElementById('myChartBar');

	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
				<?php foreach ($chartBarRA as $row) { 
					echo "'" . $row->tahun_lulus . "',";
				} ?>
			],
			datasets: [{
			    label: 'Data Alumni Berdasarkan Tahun',
			    data: [
			    	<?php foreach ($chartBarRA as $row) { 
						echo "'" . $row->hitung . "',";
					} ?>
			    ],
			    borderWidth: 1
			}]
		},
		options: {
			scales: {
			    y: {
			      beginAtZero: true
			    }
			}
		}
	});

	const ctxx = document.getElementById('myChartDoughnut');

	new Chart(ctxx, {
		type: 'doughnut',
		data: {
			labels: [
				<?php foreach ($chartDoughnutRA as $row) { 
					echo "'" . $row->status . "',";
				} ?>
			],
			datasets: [{
			    label: 'Jumlah Alumni',
			    data: [
			    	<?php foreach ($chartDoughnutRA as $row) { 
						echo "'" . $row->hitung . "',";
					} ?>
			    ],
			    backgroundColor: [
			    	'rgb(255, 99, 132)',
			    	'rgb(54, 162, 235)',
			      	'rgb(255, 205, 86)'
			    ],
			    hoverOffset: 4
			}]
		}
	});

	const ctxxx = document.getElementById('myChartPie');

	new Chart(ctxxx, {
		type: 'pie',
		data: {
			labels: [
				<?php foreach ($chartPieHK as $row) { 
					echo "'" . $row->jenis_kuesioner . "',";
				} ?>
			],
			datasets: [{
			    label: 'Jumlah Kuesioner',
			    data: [
			    	<?php foreach ($chartPieHK as $row) { 
						echo "'" . $row->hitung . "',";
					} ?>
			    ],
			    backgroundColor: [
			     	'rgb(255, 99, 132)',
			      	'rgb(54, 162, 235)',
			      	'rgb(255, 205, 86)'
			    ],
			    hoverOffset: 4
			}]
		}
	});
</script>

<script type="text/javascript">
    $(".approve").click(function() {
        var id = $(this).data('id');
        var nim = $(this).data('nim');
        console.log(id);

        Swal.fire({
            title: 'Apakah anda yakin terima akun dengan NIM ' + nim,
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
                    text: 'Akun dengan NIM ' + nim + '. Berhasil Diterima.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('Admin') ?>"
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            	Swal.fire({
			    	title: 'Batal !',
	                text: 'Akun dengan NIM ' + nim + '. Batal Diterima.',
	                type: 'error',
	                icon: 'error'
			    });
            }
        });
	});

	$(".reject").click(function() {
        var id = $(this).data('id');
        var nim = $(this).data('nim');
        console.log(id);

        Swal.fire({
            title: 'Apakah anda yakin tolak akun dengan NIM ' + nim,
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
                    text: 'Akun dengan NIM ' + nim + '. Berhasil Ditolak.',
                    type: 'success',
                    icon: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = "<?php echo base_url('Admin') ?>"
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            	Swal.fire({
			    	title: 'Batal !',
	                text: 'Akun dengan NIM ' + nim + '. Batal Ditolak.',
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