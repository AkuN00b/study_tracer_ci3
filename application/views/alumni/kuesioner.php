<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Form <?php echo $title2; ?></span>
</center><br>

<span style="font-size: Larger; font-weight: bold;">Identitas</span><br><br>

<form action="<?php echo site_url('Alumni/postKuesioner') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtid_hasilKuesioner">
	<input type="hidden" id="idDetailPeriode" value="<?php echo $idDetailPeriode; ?>">

	<div class="form-group">
		<span class="mb-1">NIM Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nim'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="nimhsmsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Kode PT</span>
		<input type="text" class="form-control" value="35003" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="kdptimsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Tahun Lulus</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_tahun_lulus'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="tahun_lulus" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Prodi</span>
		<input type="text" class="form-control" value="57401" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="kdpstmsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Nama Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nama'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="nmmhsmsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Nomor Telepon</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_telepon'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="telpomsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">Alamat Email</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_email'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="emailmsmh" name="kode[]">
    </div>

    <div class="form-group">
		<span class="mb-1">NIK Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nik'); ?>" readonly="" name="jawabanKuesioner[]">
		<input type="hidden" value="nik" name="kode[]">
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-1">
    	<i class="fa fa-floppy-o"></i> Input <?php echo $title2; ?>
    </button>
</form><br><br>

<span style="font-size: Larger; font-weight: bold;">Kuesioner Wajib</span><br><br>

<div id="pertanyaan"></div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
	const idDetailPeriode = document.getElementById("idDetailPeriode").value;

	$(document).ready(function () {
		$.ajax({
			type: "get",
			url: SITEURL + "Alumni/getKuesionerUtama/" + idDetailPeriode,
			dataType: "json",
			success: function (res) {
				console.log('data pertanyaan: ', res.length);

				let temp;
				const tanya = document.getElementById("pertanyaan");
				const ask = document.createElement("p");
				const inputHiddenKodeValue = document.createElement("input");
				const inputHiddenKodeValueJawaban = document.createElement("input");
				const inputLainnya = document.createElement("input");
				const enter = document.createElement("br");

				for (let i = 0; i < res.length; i++) {
					const formGroup = document.createElement("div");
					formGroup.setAttribute("class", "form-group");

					if (res[i].jenis == "Radio Button") {
						temp = "radio";
					} else if (res[i].jenis == "Combo Box") {
						temp = "select";
					} else if (res[i].jenis == "Text Box") {
						temp = "text";
					} else if (res[i].jenis == "Text Area") {
						temp = "textarea";
					} else if (res[i].jenis == "Check Box") {
						temp = "checkbox";
					} else if (res[i].jenis == "DateTime Picker") {
						temp = "date";
					}

					inputHiddenKodeValue.setAttribute("type", "hidden");
					inputHiddenKodeValue.setAttribute("name", "kode[]");
					inputHiddenKodeValue.setAttribute("value", res[i].kode);
					formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

					ask.setAttribute("class", "mb-1");
					ask.innerHTML = res[i].pertanyaan;
					formGroup.innerHTML += ask.outerHTML;
					// tanya.innerHTML += ask.outerHTML;

					for (let j = 0; j < res[i].jawaban.data.length; j++) {
						if (temp == "radio") {
							const ask1 = document.createElement("input");
							const label = document.createElement("label");

							ask1.setAttribute("name", "jawabanKuesioner[" + i + "]");
							ask1.setAttribute("value", res[i].jawaban.data[j].nilaiJawaban);
							ask1.setAttribute("type", temp);
							ask1.setAttribute("class", "mr-1");
							ask1.setAttribute("id", "jawabanKuesioner[" + i + "]" + res[i].jawaban.data[j].nilaiJawaban);

							label.setAttribute("for", "jawabanKuesioner[" + i + "]" + res[i].jawaban.data[j].nilaiJawaban);
							label.innerHTML = res[i].jawaban.data[j].deskripsiJawaban;
							// console.log("jawaban : "+ res[i].jawaban.data[j].deskripsiJawaban);
						} else if (temp == "combo box") {
							
						}

						if (res[i].jawaban.data[j].textbox == "Ya") {
							inputHiddenKodeValueJawaban.setAttribute("type", "hidden");
							inputHiddenKodeValueJawaban.setAttribute("name", "kode[]");
							inputHiddenKodeValueJawaban.setAttribute("value", res[i].jawaban.data[j].kode);
							formGroup.innerHTML += inputHiddenKodeValueJawaban.outerHTML;

							inputLainnya.setAttribute("class", "ml-1");
							inputLainnya.setAttribute("type", "textbox");
							inputLainnya.setAttribute("placeholder", "Tulis Keterangan di sini ...");
							inputLainnya.setAttribute("name", "jawabanKuesioner[" + i + "]")
						}

						if (temp == "radio") {
							formGroup.innerHTML += ask1.outerHTML;
						} else if (temp == "combo box") {

						}

						if (res[i].jawaban.data[j].textbox == "Ya") {
							formGroup.innerHTML += label.outerHTML;
							formGroup.innerHTML += inputLainnya.outerHTML + enter.outerHTML;
						} else {
							formGroup.innerHTML += label.outerHTML + enter.outerHTML;
						}
					}					

					tanya.innerHTML += formGroup.outerHTML;
				}
			},
			error: function (data) {
				console.log('Error: ', data);
			}
		});
	});
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template_alumni.php');
	ob_flush();
?>