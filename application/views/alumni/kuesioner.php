<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Form <?php echo $title2; ?></span>
</center><br>

<span style="font-size: Larger; font-weight: bold;">Identitas</span><br><br>

<form action="<?php echo site_url('Alumni/postKuesioner') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtid_hasilKuesioner">
	<input type="hidden" name="txtid_DetailPeriode" id="idDetailPeriode" value="<?php echo $idDetailPeriode; ?>">

	<div class="form-group">
		<span class="mb-1">Kode PT</span>
		<input type="text" class="form-control" value="35003" readonly="" name="jawabanKuesioner[0]">
		<input type="hidden" value="kdptimsmh" name="kode[0]">
    </div>

    <div class="form-group">
		<span class="mb-1">Kode Prodi</span>
		<input type="text" class="form-control" value="57401" readonly="" name="jawabanKuesioner[1]">
		<input type="hidden" value="kdpstmsmh" name="kode[1]">
    </div>

	<div class="form-group">
		<span class="mb-1">NIM Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nim'); ?>" readonly="" name="jawabanKuesioner[2]">
		<input type="hidden" value="nimhsmsmh" name="kode[2]">
    </div>

    <div class="form-group">
		<span class="mb-1">Nama Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nama'); ?>" readonly="" name="jawabanKuesioner[3]">
		<input type="hidden" value="nmmhsmsmh" name="kode[3]">
    </div>

    <div class="form-group">
		<span class="mb-1">Nomor Telepon</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_telepon'); ?>" readonly="" name="jawabanKuesioner[4]">
		<input type="hidden" value="telpomsmh" name="kode[4]">
    </div>

    <div class="form-group">
		<span class="mb-1">Alamat Email</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_email'); ?>" readonly="" name="jawabanKuesioner[5]">
		<input type="hidden" value="emailmsmh" name="kode[5]">
    </div>

    <div class="form-group">
		<span class="mb-1">Tahun Lulus</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_tahun_lulus'); ?>" readonly="" name="jawabanKuesioner[6]">
		<input type="hidden" value="tahun_lulus" name="kode[6]">
    </div>

    <div class="form-group">
		<span class="mb-1">NIK Mahasiswa</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_nik'); ?>" readonly="" name="jawabanKuesioner[7]">
		<input type="hidden" value="nik" name="kode[7]">
    </div>

    <div class="form-group">
		<span class="mb-1">NPWP Alumni</span>
		<input type="text" class="form-control" value="<?= $this->session->userdata('user_npwp'); ?>" readonly="" name="jawabanKuesioner[8]">
		<input type="hidden" value="npwp" name="kode[8]">
    </div>

    <br>
    <span style="font-size: Larger; font-weight: bold;">Kuesioner Wajib</span><br><br>

	<div id="pertanyaan"></div><br>

    <button type="submit" class="btn btn-primary mb-1">
    	<i class="fa fa-floppy-o"></i> Input <?php echo $title2; ?>
    </button>
</form><br><br>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
	// get value periode dan jenis kuesioner yang dipilih
	const idDetailPeriode = document.getElementById("idDetailPeriode").value;

	function loadKabupaten() {
	 	var id_provinsi = $('#provinsi').val();

	 	if (id_provinsi) {
	    	$.ajax({
	      		type: 'GET',
	      		url: SITEURL + "Alumni/getKabupatenKota/" + id_provinsi,
	     		dataType: 'json',
	      		success: function(res) {
	        		$('#kabupaten').find('option').not(':first').remove();
			        $.each(res, function(index, kabupaten) {
			          	$('#kabupaten').append('<option value="' + kabupaten.kabkota_id + '">' + kabupaten.kabkota_deskripsi + '</option>');
			        });
	      		}
	    	});
		} else {
		    $('#kabupaten').find('option').not(':first').remove();
		}
	}

	// untuk load otomatis saat form diakses
	$(document).ready(function () {
		$.ajax({
			type: "get",
			url: SITEURL + "Alumni/getKuesionerUtama/" + idDetailPeriode,
			dataType: "json",
			success: function (res) {
				// get jumlah data pertanyaan utama
				console.log(res);

				// deklarasi
				let temp;
				let temp2;
				let helpIncrement;
				let helper = 8;

				const tanya = document.getElementById("pertanyaan");

				const ask = document.createElement("label");

				const inputHiddenKodeValue = document.createElement("input");
				const inputHiddenKodeValueJawaban = document.createElement("input");
				const inputHiddenKodeValueJawabann = document.createElement("input");
				const inputLainnya = document.createElement("input");

				const enter = document.createElement("br");

				// get pertanyaan utama
				for (let i = 0; i < res.length; i++) {
					// deklarasi
					const formGroup = document.createElement("div");
					formGroup.setAttribute("class", "form-group");

					helper++;

					if (res[i].kode == "f5a1") {
						// get pertanyaan

						inputHiddenKodeValue.setAttribute("type", "hidden");
						inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
						inputHiddenKodeValue.setAttribute("value", res[i].kode);

						formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

						ask.setAttribute("class", "mb-1");
						ask.setAttribute("for", "provinsi")
						ask.innerHTML = res[i].pertanyaan;
						formGroup.innerHTML += ask.outerHTML + enter.outerHTML;

						const selectProv = document.createElement('select');
						selectProv.setAttribute("name", "jawabanKuesioner[" + helper + "]");
						selectProv.setAttribute("class", "form-control");
						selectProv.setAttribute("onchange", "loadKabupaten()");

						const option = document.createElement("option");   						

						option.value = "";
						option.text = "-- Pilih " + res[i].pertanyaan + " --";

						selectProv.appendChild(option);
						selectProv.setAttribute("id", "provinsi");

						formGroup.innerHTML += selectProv.outerHTML;
					} else if (res[i].kode == "f5a2") {
						// get pertanyaan

						inputHiddenKodeValue.setAttribute("type", "hidden");
						inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
						inputHiddenKodeValue.setAttribute("value", res[i].kode);

						formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

						ask.setAttribute("class", "mb-1");
						ask.setAttribute("for", "kabupaten")
						ask.innerHTML = res[i].pertanyaan;
						formGroup.innerHTML += ask.outerHTML + enter.outerHTML;

						const selectKab = document.createElement('select');
						selectKab.setAttribute("name", "jawabanKuesioner[" + helper + "]");
						selectKab.setAttribute("class", "form-control");

						const option = document.createElement("option");   						

						option.value = "";
						option.text = "-- Pilih " + res[i].pertanyaan + " --";

						selectKab.appendChild(option);
						selectKab.setAttribute("id", "kabupaten");

						formGroup.innerHTML += selectKab.outerHTML;
					} else {
						const select = document.createElement('select');
						select.setAttribute("name", "jawabanKuesioner[" + helper + "]");
						select.setAttribute("class", "form-control");

						if (res[i].jenis != "Hidden") {
							// get pertanyaan
							ask.setAttribute("class", "mb-1");
							ask.setAttribute("for", "jawabanKuesioner[" + i + "]ID")
							ask.innerHTML = res[i].pertanyaan;
							formGroup.innerHTML += ask.outerHTML + enter.outerHTML;
						}

						// menentukan jenis jawaban
						if (res[i].jenis == "Radio Button") {
							temp = "radio";

							inputHiddenKodeValue.setAttribute("type", "hidden");
							inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
							inputHiddenKodeValue.setAttribute("value", res[i].kode);

							formGroup.innerHTML += inputHiddenKodeValue.outerHTML;
						} else if (res[i].jenis == "Combo Box") {
							temp = "select";

							inputHiddenKodeValue.setAttribute("type", "hidden");
							inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
							inputHiddenKodeValue.setAttribute("value", res[i].kode);

							formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

							const option = document.createElement("option");   						

							option.value = "";
							option.text = "-- Pilih " + res[i].pertanyaan + " --";

							select.appendChild(option);
							select.setAttribute("id", "jawabanKuesioner[" + i + "]ID");
						} else if (res[i].jenis == "Text Box" || res[i].jenis == "Hidden") {
							if (res[i].jenis == "Text Box") {
								temp = "text";
							} else if (res[i].jenis == "Hidden") {
								temp = "hidden";
							}

							inputHiddenKodeValue.setAttribute("type", "hidden");
							inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
							inputHiddenKodeValue.setAttribute("value", res[i].kode);

							formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

							const askTB = document.createElement("input");

							askTB.setAttribute("name", "jawabanKuesioner[" + helper + "]");
							askTB.setAttribute("type", temp);
							askTB.setAttribute("id", "jawabanKuesioner[" + i + "]ID");
							askTB.setAttribute("class", "form-control");

							formGroup.innerHTML += askTB.outerHTML;
						} else if (res[i].jenis == "Text Area") {
							temp = "textarea";

							inputHiddenKodeValue.setAttribute("type", "hidden");
							inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
							inputHiddenKodeValue.setAttribute("value", res[i].kode);

							formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

							const textArea = document.createElement(temp);

							textArea.setAttribute("name", "jawabanKuesioner[" + helper + "]");
							textArea.setAttribute("rows", "7");
							textArea.setAttribute("class", "form-control");
							textArea.setAttribute("id", "jawabanKuesioner[" + i + "]ID");

							formGroup.innerHTML += textArea.outerHTML;
						} else if (res[i].jenis == "Check Box" || res[i].jenis == "Check Box Value Berurutan") {
							temp = "checkbox";

							if (res[i].jenis == "Check Box Value Berurutan") {
								temp2 = "increment";
								helpIncrement = 0;
							}
						} else if (res[i].jenis == "DateTime Picker") {
							temp = "date";

							inputHiddenKodeValue.setAttribute("type", "hidden");
							inputHiddenKodeValue.setAttribute("name", "kode[" + helper + "]");
							inputHiddenKodeValue.setAttribute("value", res[i].kode);

							formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

							const askTB2 = document.createElement("input");

							askTB2.setAttribute("name", "jawabanKuesioner[" + helper + "]");
							askTB2.setAttribute("type", temp);
							askTB2.setAttribute("class", "form-control");
							askTB2.setAttribute("id", "jawabanKuesioner[" + i + "]ID");

							formGroup.innerHTML += askTB2.outerHTML;
						}

						let fixArray = helper;

						if (res[i].jenis == "Check Box" || res[i].jenis == "Check Box Value Berurutan") {
							helper--;
						}

						var idLoopCB = 0;

						if (temp == "radio") 
						{
							const inputHiddenIfNULL = document.createElement("input");

							inputHiddenIfNULL.setAttribute("name", "jawabanKuesioner[" + fixArray + "]");
							inputHiddenIfNULL.setAttribute("type", "hidden");
							inputHiddenIfNULL.setAttribute("value", " ");

							formGroup.innerHTML += inputHiddenIfNULL.outerHTML;
						}

						// get opsi jawaban dari pertanyaan utama
						for (let j = 0; j < res[i].jawaban.length; j++) {

							const ask1 = document.createElement("input");
							const ask12 = document.createElement("input");

							const label = document.createElement("label");
							const label2 = document.createElement("label");

							const inputHiddenIfNULL = document.createElement("input");

							// yang sudah ditentukan tadi di generate elemen-elemen jawabannya
							if (temp == "radio") {
								ask1.setAttribute("name", "jawabanKuesioner[" + fixArray + "]");
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
							} else if (temp == "checkbox") {
								inputHiddenIfNULL.setAttribute("name", "jawabanKuesioner[" + ++helper + "]");
								inputHiddenIfNULL.setAttribute("type", "hidden");
								inputHiddenIfNULL.setAttribute("value", " ");

								inputHiddenKodeValueJawaban.setAttribute("type", "hidden");
								inputHiddenKodeValueJawaban.setAttribute("name", "kode[" + helper + "]");
								inputHiddenKodeValueJawaban.setAttribute("value", res[i].jawaban[j].kode);

								++idLoopCB;

								ask12.setAttribute("name", "jawabanKuesioner[" + helper + "]");

								if (temp2 == "increment") {
									ask12.setAttribute("value", ++helpIncrement);
								} else {
									ask12.setAttribute("value", "1");
								}

								ask12.setAttribute("type", temp);
								ask12.setAttribute("class", "mr-1");
								ask12.setAttribute("id", "jawabanKuesioner[" + helper + "]" + idLoopCB + i + "");

								label2.setAttribute("for", "jawabanKuesioner[" + helper + "]" + idLoopCB + i + "");
								label2.innerHTML = res[i].jawaban[j].deskripsiJawaban;
							}

							var xyz = helper;
							var xyza = xyz++;

							// validasi menentukan apakah jawaban butuh text box
							if (res[i].jawaban[j].textbox == "Ya") {
								if (res[i].jenis == "Check Box" || res[i].jenis == "Check Box Value Berurutan") {
									if (res[i].jawaban[j].kode.length == 4) {
										var lastDigit = res[i].jawaban[j].kode.slice(-3);
									} else if (res[i].jawaban[j].kode.length == 5) {
										var lastDigit = res[i].jawaban[j].kode.slice(-4);
									}

									var firstDigit = res[i].jawaban[j].kode;
									firstDigit = firstDigit[0];
									lastDigit++;

									var result = firstDigit + lastDigit;
									inputHiddenKodeValueJawabann.setAttribute("type", "hidden");
									inputHiddenKodeValueJawabann.setAttribute("name", "kode[" + ++xyza + "]");
									inputHiddenKodeValueJawabann.setAttribute("value", result);

									inputLainnya.setAttribute("class", "ml-1");
									inputLainnya.setAttribute("type", "textbox");
									inputLainnya.setAttribute("placeholder", "Tulis Keterangan di sini ...");
									inputLainnya.setAttribute("name", "jawabanKuesioner[" + ++helper + "]");
								} else {
									inputHiddenKodeValueJawaban.setAttribute("type", "hidden");
									inputHiddenKodeValueJawaban.setAttribute("name", "kode[" + ++helper + "]");
									inputHiddenKodeValueJawaban.setAttribute("value", res[i].jawaban[j].kode);

									inputLainnya.setAttribute("class", "ml-1");
									inputLainnya.setAttribute("type", "textbox");
									inputLainnya.setAttribute("placeholder", "Tulis Keterangan di sini ...");
									inputLainnya.setAttribute("name", "jawabanKuesioner[" + helper + "]");
								}
							}

							if (temp == "radio") {
								formGroup.innerHTML += ask1.outerHTML;
							} else if (temp == "checkbox") {
								formGroup.innerHTML += inputHiddenIfNULL.outerHTML + inputHiddenKodeValueJawaban.outerHTML + ask12.outerHTML;
							}

							// di lempar textbox nya ke view
							if (res[i].jawaban[j].textbox == "Ya") {
								if (temp == "checkbox") {
									formGroup.innerHTML += label2.outerHTML;
									formGroup.innerHTML += inputHiddenKodeValueJawabann.outerHTML + inputLainnya.outerHTML + enter.outerHTML;
								} else if (temp == "radio") {
									formGroup.innerHTML += label.outerHTML;
									formGroup.innerHTML += inputHiddenKodeValueJawaban.outerHTML + inputLainnya.outerHTML + enter.outerHTML;
								}
							} else {
								if (temp == "radio") {
									formGroup.innerHTML += label.outerHTML + enter.outerHTML;
								} else if (temp == "checkbox") {
									formGroup.innerHTML += label2.outerHTML + enter.outerHTML;
								}
							}
						}

						if (temp == "select") {
							formGroup.innerHTML += select.outerHTML;
						}
					}				

					tanya.innerHTML += formGroup.outerHTML;
				}
			},
			error: function (data) {
				console.log('Error: ', data);
			}
		});

		$.ajax({
	        type: "GET",
	        url: SITEURL + "Alumni/getProvinsi",
	        dataType: "json",
	        success: function(res) {
	            // Tambahkan setiap opsi ke elemen select
	            for (var i = 0; i < res.length; i++) {
	                $("#provinsi").append("<option value='" + res[i].provinsi_id + "'>" + res[i].provinsi_deskripsi + "</option>");
	            }
	        }
	    });
	});
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template_alumni.php');
	ob_flush();
?>