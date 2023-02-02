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

<div id="pertanyaan"></div><br><br>

<span style="font-size: Larger; font-weight: bold;">Kuesioner Tambahan</span><br><br>

<div id="pertanyaanTurunan"></div>

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

				// get pertanyaan utama
				for (let i = 0; i < res.length; i++) {
					const formGroup = document.createElement("div");
					formGroup.setAttribute("class", "form-group");

					const select = document.createElement('select');
					select.setAttribute("name", "jawabanKuesioner[]");
					select.setAttribute("class", "form-control");

					inputHiddenKodeValue.setAttribute("type", "hidden");
					inputHiddenKodeValue.setAttribute("name", "kode[]");
					inputHiddenKodeValue.setAttribute("value", res[i].kode);
					formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

					ask.setAttribute("class", "mb-1");
					ask.innerHTML = res[i].pertanyaan;
					formGroup.innerHTML += ask.outerHTML;

					if (res[i].jenis == "Radio Button") {
						temp = "radio";
					} else if (res[i].jenis == "Combo Box") {
						temp = "select";

						const option = document.createElement("option");   						

						option.value = "";
						option.text = "-- Pilih " + res[i].pertanyaan + " --";

						select.appendChild(option);
					} else if (res[i].jenis == "Text Box") {
						temp = "text";

						const askTB = document.createElement("input");

						askTB.setAttribute("name", "jawabanKuesioner[]");
						askTB.setAttribute("type", temp);
						askTB.setAttribute("class", "form-control");

						formGroup.innerHTML += askTB.outerHTML;
					} else if (res[i].jenis == "Text Area") {
						temp = "textarea";

						const textArea = document.createElement(temp);

						textArea.setAttribute("name", "jawabanKuesioner[]");
						textArea.setAttribute("rows", "7");
						textArea.setAttribute("class", "form-control");

						formGroup.innerHTML += textArea.outerHTML;
					} else if (res[i].jenis == "Check Box") {
						temp = "checkbox";
					} else if (res[i].jenis == "DateTime Picker") {
						temp = "date";
					}

					// get opsi jawaban dari pertanyaan utama
					for (let j = 0; j < res[i].jawaban.length; j++) {
						const ask1 = document.createElement("input");
						const label = document.createElement("label");

						if (temp == "radio") {
							ask1.setAttribute("name", "jawabanKuesioner[" + i + "]");
							ask1.setAttribute("value", res[i].jawaban[j].nilaiJawaban);
							ask1.setAttribute("type", temp);
							ask1.setAttribute("class", "mr-1");
							ask1.setAttribute("id", "jawabanKuesioner[" + i + "]" + res[i].jawaban[j].nilaiJawaban);

							label.setAttribute("for", "jawabanKuesioner[" + i + "]" + res[i].jawaban[j].nilaiJawaban);
							label.innerHTML = res[i].jawaban[j].deskripsiJawaban;
							// console.log("jawaban : "+ res[i].jawaban[j].deskripsiJawaban);
						} else if (temp == "select") {
    						const option = document.createElement("option");   						

    						option.value = res[i].jawaban[j].nilaiJawaban;
    						option.text = res[i].jawaban[j].deskripsiJawaban;

							select.appendChild(option);
						}

						if (res[i].jawaban[j].textbox == "Ya") {
							inputHiddenKodeValueJawaban.setAttribute("type", "hidden");
							inputHiddenKodeValueJawaban.setAttribute("name", "kode[]");
							inputHiddenKodeValueJawaban.setAttribute("value", res[i].jawaban[j].kode);
							formGroup.innerHTML += inputHiddenKodeValueJawaban.outerHTML;

							inputLainnya.setAttribute("class", "ml-1");
							inputLainnya.setAttribute("type", "textbox");
							inputLainnya.setAttribute("placeholder", "Tulis Keterangan di sini ...");
							inputLainnya.setAttribute("name", "jawabanKuesioner[" + i + "]")
						}

						if (temp == "radio") {
							formGroup.innerHTML += ask1.outerHTML;
						}

						if (res[i].jawaban[j].textbox == "Ya") {
							formGroup.innerHTML += label.outerHTML;
							formGroup.innerHTML += inputLainnya.outerHTML + enter.outerHTML;
						} else {
							if (temp == "radio") {
								formGroup.innerHTML += label.outerHTML + enter.outerHTML;
							}
						}

						// get pertanyaan turunan dari opsi jawaban pertanyaan utama
						// for (let k = 0; k < res[i].jawaban.length; k++) {
							
						// }
					}	

					if (temp == "select") {
						formGroup.innerHTML += select.outerHTML;
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