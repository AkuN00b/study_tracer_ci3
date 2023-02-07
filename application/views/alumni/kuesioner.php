<?php ob_start();?>

<center>
	<span style="font-size: Larger; font-weight: bold;">Form <?php echo $title2; ?></span>
</center><br>

<span style="font-size: Larger; font-weight: bold;">Identitas</span><br><br>

<form action="<?php echo site_url('Alumni/postKuesioner') ?>" method="POST" autocomplete="off">
	<input type="hidden" value="<?php echo $id; ?>" name="txtid_hasilKuesioner">
	<input type="hidden" name="txtid_DetailPeriode" id="idDetailPeriode" value="<?php echo $idDetailPeriode; ?>">

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
	// get value periode dan jenis kuesioner yang dipilih
	const idDetailPeriode = document.getElementById("idDetailPeriode").value;

	// untuk load otomatis saat form diakses
	$(document).ready(function () {
		$.ajax({
			type: "get",
			url: SITEURL + "Alumni/getKuesionerUtama/" + idDetailPeriode,
			dataType: "json",
			success: function (res) {
				// get jumlah data pertanyaan utama
				console.log('data pertanyaan: ', res.length);

				// deklarasi
				let temp;
				let temp2;
				let temp3;


				const tanya = document.getElementById("pertanyaan");
				const tanya2 = document.getElementById("pertanyaanTurunan");


				const ask = document.createElement("p");
				const ask2 = document.createElement("p");
				const ask3 = document.createElement("p");


				const inputHiddenKodeValue = document.createElement("input");
				const inputHiddenKodeValueJawaban = document.createElement("input");
				const inputLainnya = document.createElement("input");

				const inputHiddenKodeValue2 = document.createElement("input");
				const inputHiddenKodeValueJawaban2 = document.createElement("input");
				const inputLainnya2 = document.createElement("input");

				const inputHiddenKodeValue3 = document.createElement("input");
				const inputHiddenKodeValueJawaban3 = document.createElement("input");
				const inputLainnya3 = document.createElement("input");


				const enter = document.createElement("br");


				// get pertanyaan utama
				for (let i = 0; i < res.length; i++) {
					// deklarasi
					const formGroup = document.createElement("div");
					formGroup.setAttribute("class", "form-group");

					const select = document.createElement('select');
					select.setAttribute("name", "jawabanKuesioner[]");
					select.setAttribute("class", "form-control");

					// get kode pertanyaan
					inputHiddenKodeValue.setAttribute("type", "hidden");
					inputHiddenKodeValue.setAttribute("name", "kode[]");
					inputHiddenKodeValue.setAttribute("value", res[i].kode);

					formGroup.innerHTML += inputHiddenKodeValue.outerHTML;

					// get pertanyaan
					ask.setAttribute("class", "mb-1");
					ask.innerHTML = res[i].pertanyaan;
					formGroup.innerHTML += ask.outerHTML;

					// menentukan jenis jawaban
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

						// yang sudah ditentukan tadi di generate elemen-elemen jawabannya
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

						// validasi menentukan apakah jawaban butuh text box
						if (res[i].jawaban[j].textbox == "Ya") {
							inputHiddenKodeValueJawaban.setAttribute("type", "hidden");
							inputHiddenKodeValueJawaban.setAttribute("name", "kode[]");
							inputHiddenKodeValueJawaban.setAttribute("value", res[i].jawaban[j].kode);
							formGroup.innerHTML += inputHiddenKodeValueJawaban.outerHTML;

							inputLainnya.setAttribute("class", "ml-1");
							inputLainnya.setAttribute("type", "textbox");
							inputLainnya.setAttribute("placeholder", "Tulis Keterangan di sini ...");
							inputLainnya.setAttribute("name", "jawabanKuesioner[" + i + "]");
						}

						if (temp == "radio") {
							formGroup.innerHTML += ask1.outerHTML;
						}

						// di lempar textbox nya ke view
						if (res[i].jawaban[j].textbox == "Ya") {
							formGroup.innerHTML += label.outerHTML;
							formGroup.innerHTML += inputLainnya.outerHTML + enter.outerHTML;
						} else {
							if (temp == "radio") {
								formGroup.innerHTML += label.outerHTML + enter.outerHTML;
							}
						}

						// get pertanyaan turunan dari opsi jawaban pertanyaan utama
						for (let k = 0; k < res[i].jawaban[j].pertanyaan_turunan.length; k++) {
							// deklarasi
							const select2 = document.createElement('select');
							select2.setAttribute("name", "jawabanKuesioner[]");
							select2.setAttribute("class", "form-control");

							const formGroup2 = document.createElement("div");
							formGroup2.setAttribute("class", "form-group");

							// get kode pertanyaan turunan
							inputHiddenKodeValue2.setAttribute("type", "hidden");
							inputHiddenKodeValue2.setAttribute("name", "kode[]");
							inputHiddenKodeValue2.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].kode);
							formGroup2.innerHTML += inputHiddenKodeValue2.outerHTML;

							// get pertanyaan turunan
							ask2.setAttribute("class", "mb-1");
							ask2.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].pertanyaan;
							formGroup2.innerHTML += ask2.outerHTML;

							// menentukan jenis jawaban pertanyaan turunan
							if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "Radio Button") {
								temp2 = "radio";
							} else if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "Combo Box") {
								temp2 = "select";

								const option2 = document.createElement("option");   						

								option2.value = "";
								option2.text = "-- Pilih " + res[i].jawaban[j].pertanyaan_turunan[k].pertanyaan + " --";

								select2.appendChild(option2);
							} else if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "Text Box") {
								temp2 = "text";

								const askTB2 = document.createElement("input");

								askTB2.setAttribute("name", "jawabanKuesioner[]");
								askTB2.setAttribute("type", temp2);
								askTB2.setAttribute("class", "form-control");

								formGroup2.innerHTML += askTB2.outerHTML;
							} else if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "Text Area") {
								temp2 = "textarea";

								const textArea2 = document.createElement(temp2);

								textArea2.setAttribute("name", "jawabanKuesioner[]");
								textArea2.setAttribute("rows", "7");
								textArea2.setAttribute("class", "form-control");

								formGroup2.innerHTML += textArea2.outerHTML;
							} else if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "Check Box") {
								temp2 = "checkbox";
							} else if (res[i].jawaban[j].pertanyaan_turunan[k].jenis == "DateTime Picker") {
								temp2 = "date";

								const askTB2 = document.createElement("input");

								askTB2.setAttribute("name", "jawabanKuesioner[]");
								askTB2.setAttribute("type", temp2);
								askTB2.setAttribute("class", "form-control");

								formGroup2.innerHTML += askTB2.outerHTML;
							}

							// get opsi jawaban dari pertanyaan turunan
							for (let l = 0; l < res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan.length; l++) {
								const ask12 = document.createElement("input");
								const ask22 = document.createElement("input");
								const label2 = document.createElement("label");

								// yang sudah ditentukan tadi di generate elemen-elemen jawabannya
								if (temp2 == "radio") {
									ask12.setAttribute("name", "jawabanKuesioner[" + k + i + "]");
									ask12.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban);
									ask12.setAttribute("type", temp2);
									ask12.setAttribute("class", "mr-1");
									ask12.setAttribute("id", "jawabanKuesioner[" + k + i + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban);
									label2.setAttribute("for", "jawabanKuesioner[" + k + i + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban);
									label2.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].deskripsiJawaban;
									// console.log("jawaban : "+ res[i].jawaban[j].deskripsiJawaban);
								} else if (temp2 == "select") {
		    						const option3 = document.createElement("option");   						

		    						option3.value = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban;
		    						option3.text = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].deskripsiJawaban;

									select2.appendChild(option3);
								} else if (temp2 == "checkbox") {
									ask22.setAttribute("name", "jawabanKuesioner[]");
									ask12.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban);
									ask22.setAttribute("type", temp2);
									ask22.setAttribute("class", "mr-1");
									ask22.setAttribute("id", "jawabanKuesioner[" + k + i + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban + l);
									label2.setAttribute("for", "jawabanKuesioner[" + k + i + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban + l);
									label2.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].deskripsiJawaban;
								}

								// validasi menentukan apakah jawaban butuh text box
								if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].textbox == "Ya") {
									inputHiddenKodeValueJawaban2.setAttribute("type", "hidden");
									inputHiddenKodeValueJawaban2.setAttribute("name", "kode[]");
									inputHiddenKodeValueJawaban2.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].kode);
									formGroup2.innerHTML += inputHiddenKodeValueJawaban2.outerHTML;

									inputLainnya2.setAttribute("class", "ml-1");
									inputLainnya2.setAttribute("type", "textbox");
									inputLainnya2.setAttribute("placeholder", "Tulis Keterangan di sini ...");
									inputLainnya2.setAttribute("name", "jawabanKuesioner[" + l + "]");
								}

								if (temp2 == "radio") {
									formGroup2.innerHTML += ask12.outerHTML;
								} else if (temp2 == "checkbox") {
									formGroup2.innerHTML += ask22.outerHTML;
								}

								// di lempar textbox nya ke view
								if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].textbox == "Ya") {
									formGroup2.innerHTML += label2.outerHTML;
									formGroup2.innerHTML += inputLainnya2.outerHTML + enter.outerHTML;
								} else {
									if (temp2 == "radio") {
										formGroup2.innerHTML += label2.outerHTML + enter.outerHTML;
									} else if (temp2 == "checkbox") {
										formGroup2.innerHTML += label2.outerHTML + enter.outerHTML;
									}
								}

								if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2.length > 0) {

									// get pertanyaan turunan 2 dari opsi jawaban pertanyaan turunan
									for (let m = 0; m < res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2.length; m++) {
										// deklarasi
										const select3 = document.createElement('select');
										select3.setAttribute("name", "jawabanKuesioner[]");
										select3.setAttribute("class", "form-control");

										const formGroup3 = document.createElement("div");
										formGroup3.setAttribute("class", "form-group");

										// get kode pertanyaan turunan 2
										inputHiddenKodeValue3.setAttribute("type", "hidden");
										inputHiddenKodeValue3.setAttribute("name", "kode[]");
										inputHiddenKodeValue3.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].kode);
										formGroup3.innerHTML += inputHiddenKodeValue3.outerHTML;

										// get pertanyaan turunan 2
										ask3.setAttribute("class", "mb-1");
										ask3.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].pertanyaan;
										formGroup3.innerHTML += ask3.outerHTML;

										// menentukan jenis jawaban pertanyaan turunan 2
										if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "Radio Button") {
											temp3 = "radio";
										} else if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "Combo Box") {
											temp3 = "select";

											const option3 = document.createElement("option");   						

											option3.value = "";
											option3.text = "-- Pilih " + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].pertanyaan + " --";

											select3.appendChild(option3);
										} else if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "Text Box") {
											temp3 = "text";

											const askTB3 = document.createElement("input");

											askTB3.setAttribute("name", "jawabanKuesioner[]");
											askTB3.setAttribute("type", temp3);
											askTB3.setAttribute("class", "form-control");

											formGroup3.innerHTML += askTB3.outerHTML;
										} else if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "Text Area") {
											temp3 = "textarea";

											const textArea3 = document.createElement(temp3);

											textArea3.setAttribute("name", "jawabanKuesioner[]");
											textArea3.setAttribute("rows", "7");
											textArea3.setAttribute("class", "form-control");

											formGroup3.innerHTML += textArea3.outerHTML;
										} else if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "Check Box") {
											temp3 = "checkbox";
										} else if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jenis == "DateTime Picker") {
											temp3 = "date";

											const askTB3 = document.createElement("input");

											askTB3.setAttribute("name", "jawabanKuesioner[]");
											askTB3.setAttribute("type", temp3);
											askTB3.setAttribute("class", "form-control");

											formGroup3.innerHTML += askTB3.outerHTML;
										}

										// get opsi jawaban dari pertanyaan turunan 2
										for (let n = 0; n < res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2.length; n++) {
											const ask13 = document.createElement("input");
											const ask23 = document.createElement("input");
											const label3 = document.createElement("label");

											// yang sudah ditentukan tadi di generate elemen-elemen jawabannya
											if (temp3 == "radio") {
												ask13.setAttribute("name", "jawabanKuesioner[" + k + i + l + "]");
												ask13.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban);
												ask13.setAttribute("type", temp3);
												ask13.setAttribute("class", "mr-1");
												ask13.setAttribute("id", "jawabanKuesioner[" + k + i + l + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban);
												label3.setAttribute("for", "jawabanKuesioner[" + k + i + l + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].nilaiJawaban);
												label3.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].deskripsiJawaban;
												// console.log("jawaban : "+ res[i].jawaban[j].deskripsiJawaban);
											} else if (temp3 == "select") {
					    						const option3 = document.createElement("option");   						

					    						option3.value = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban;
					    						option3.text = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].deskripsiJawaban;

												select3.appendChild(option3);
											} else if (temp3 == "checkbox") {
												ask23.setAttribute("name", "jawabanKuesioner[]");
												ask13.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban);
												ask23.setAttribute("type", temp3);
												ask23.setAttribute("class", "mr-1");
												ask23.setAttribute("id", "jawabanKuesioner[" + k + i + l + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban + l);
												label3.setAttribute("for", "jawabanKuesioner[" + k + i + l + "]" + res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].nilaiJawaban + l);
												label3.innerHTML = res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].deskripsiJawaban;
											}

											// validasi menentukan apakah jawaban butuh text box
											if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].textbox == "Ya") {
												inputHiddenKodeValueJawaban3.setAttribute("type", "hidden");
												inputHiddenKodeValueJawaban3.setAttribute("name", "kode[]");
												inputHiddenKodeValueJawaban3.setAttribute("value", res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].kode);
												formGroup2.innerHTML += inputHiddenKodeValueJawaban3.outerHTML;

												inputLainnya3.setAttribute("class", "ml-1");
												inputLainnya3.setAttribute("type", "textbox");
												inputLainnya3.setAttribute("placeholder", "Tulis Keterangan di sini ...");
												inputLainnya3.setAttribute("name", "jawabanKuesioner[" + n + "]");
											}

											if (temp3 == "radio") {
												formGroup2.innerHTML += ask13.outerHTML;
											} else if (temp3 == "checkbox") {
												formGroup2.innerHTML += ask23.outerHTML;
											}

											// di lempar textbox nya ke view
											if (res[i].jawaban[j].pertanyaan_turunan[k].jawaban_pertanyaan_turunan[l].pertanyaan_turunan_2[m].jawaban_pertanyaan_turunan_2[n].textbox == "Ya") {
												formGroup2.innerHTML += label3.outerHTML;
												formGroup2.innerHTML += inputLainnya3.outerHTML + enter.outerHTML;
											} else {
												if (temp3 == "radio") {
													formGroup2.innerHTML += label3.outerHTML + enter.outerHTML;
												} else if (temp3 == "checkbox") {
													formGroup2.innerHTML += label3.outerHTML + enter.outerHTML;
												}
											}
										}

										if (temp3 == "select") {
											formGroup3.innerHTML += select3.outerHTML;
										}

										tanya2.innerHTML += formGroup3.outerHTML;
									}
								}
							}

							if (temp2 == "select") {
								formGroup2.innerHTML += select2.outerHTML;
							}

							tanya2.innerHTML += formGroup2.outerHTML;
						}
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