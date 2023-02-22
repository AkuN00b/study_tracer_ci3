<?php ob_start();?>

<div class="container-fluid p-4" style="background-color: white; border-radius: 20px;">
    <form action="<?php echo site_url('Welcome/inputRegister') ?>" method="POST" autocomplete="off">
        <div class="row">
            <div class="col-md-4">
                <h4>Politeknik Astra</h4>
                <hr />

                <p>Politeknik Astra adalah sebuah lembaga pendidikan di bawah naungan Yayasan Astra Bina Ilmu (YABI), merupakan salah satu anak perusahaan PT Astra International, Tbk. Politeknik Astra berlokasi di Komplek Astra International, Tbk., Jalan Gaya Motor Raya no.8, Sunter II, Jakarta Utara, Jakarta 14330.</p><br>

                <h4>Lulusan Politeknik Astra</h4>
                <hr />

                <img src="<?php echo base_url() ?>assets/image/alumni.jpg" style="width: 100%"><br><br><br>
            </div>

            <div class="col-md-8">
                <h4>Registrasi Tracer Study</h4>
                <hr />
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txtNIM">
                                Nomor Induk Mahasiswa (NIM)
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtNIM" type="number" name="txtNIM" onKeyPress="if(this.value.length == 10) return false;" class="form-control" required
                                    oninvalid="this.setCustomValidity('Nomor Induk Mahasiswa (NIM) Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="txtNama">
                                Nama
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtNama" type="text" name="txtNama" maxlength="100" class="form-control" required
                                    oninvalid="this.setCustomValidity('Nama Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="txtNIK">
                                Nomor Induk Kependudukan (NIK)
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtNIK" type="number" name="txtNIK" onKeyPress="if(this.value.length == 16) return false;" class="form-control" required
                                    oninvalid="this.setCustomValidity('Nomor Induk Kependudukan (NIK) Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txtTanggalLahir">
                                Tanggal Lahir
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtTanggalLahir" type="date" name="txtTanggalLahir" class="form-control" required
                                    oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="txtTahunLulus">
                                Tahun Lulus
                                <span style="color: red;">*</span>
                            </label>
                            <select id="txtTahunLulus" class="form-control" name="txtTahunLulus" id="txtTahunLulus" required
                                    oninvalid="this.setCustomValidity('Tahun Lulus Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtTelepon">
                                Nomor Telepon
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtTelepon" type="number" onKeyPress="if(this.value.length == 13) return false;" name="txtTelepon" class="form-control" required
                                    oninvalid="this.setCustomValidity('Nomor Telepon Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txtEmail">
                                Email
                                <span style="color: red;">*</span>
                            </label>
                            <input id="txtEmail" type="email" maxlength="100" name="txtEmail" class="form-control" required
                                    oninvalid="this.setCustomValidity('Email Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="txtPassword">
                                Kata Sandi
                                <span style="color: red;">*</span>
                            </label>
                            <input type="password" maxlength="50" id="txtPassword" name="txtPassword" class="form-control" required
                                    oninvalid="this.setCustomValidity('Password Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="txtKonfirmasiPassword">
                                Konfirmasi Kata Sandi
                                <span style="color: red;">*</span><span style="color: red;" id="txtKonfirmasiPasswordMsg"></span>
                            </label>
                            <input type="password" maxlength="50" id="txtKonfirmasiPassword" name="txtKonfirmasiPassword" class="form-control" required
                                    oninvalid="this.setCustomValidity('Konfirmasi Password Wajib Diisi')"
                                    oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="txtAlamat">
                                Alamat
                                <span style="color: red;">*</span>
                            </label>
                            <textarea id="txtAlamat" name="txtAlamat" class="form-control" rows="10" required
                                    oninvalid="this.setCustomValidity('Alamat Wajib Diisi')"
                                    oninput="this.setCustomValidity('')"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="btnRegister" class="btn btn-primary" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">Daftar</button>
        <span style="margin-top: 10px;">Kembali untuk <a href='<?php echo site_url('/'); ?>'>Login</a>.</span>
    </form>
</div>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
    var error_password = true;

    $(function() {
        $("#txtKonfirmasiPasswordMsg").hide();

        $("#txtPassword").keyup(function() {
            confirmPassword();

            if (error_password) {
                $('#btnRegister').prop('disabled', error_password);
            } else {
                $('#btnRegister').prop('disabled', error_password);
            }
        });

        $("#txtKonfirmasiPassword").keyup(function() {
            confirmPassword();

            if (error_password) {
                $('#btnRegister').prop('disabled', error_password);
            } else {
                $('#btnRegister').prop('disabled', error_password);
            }
        });
    });

    function confirmPassword(){
        var pw1 = $("#txtPassword").val();
        var pw2 = $("#txtKonfirmasiPassword").val();
        
        if ($('#txtKonfirmasiPassword').val().trim() === '') {
            $("#txtKonfirmasiPasswordMsg").html(" Password Tidak Cocok");
            $("#txtKonfirmasiPasswordMsg").show();
            error_password = true;
        } else {
            if (pw1 === pw2) {
                $("#txtKonfirmasiPasswordMsg").hide();
                error_password = false;
            } else {
                $("#txtKonfirmasiPasswordMsg").html(" Password Tidak Cocok");
                $("#txtKonfirmasiPasswordMsg").show();
                error_password = true;
            }
        }
    }

    const currentYear = (new Date()).getFullYear();
    const range = (start, stop, step) => Array.from({ length: (stop - start) / step + 1}, (_, i) => start + (i * step));
    const threeYears = range(currentYear - 1, currentYear - 3, -1);
    console.log(threeYears[0]); 

    var select = document.getElementById('txtTahunLulus');

    var op = document.createElement('option');
    op.value = '';
    op.innerHTML = "-- Pilih Tahun Lulus --";
    select.appendChild(op);

    for (var i = 0; i < 3; i++) {
        var opt = document.createElement('option');
        opt.value = threeYears[i];
        opt.innerHTML = threeYears[i];

        select.appendChild(opt);
    }

    function showAlert() {
        $("#txtUsername").effect("shake");
        $("#txtPassword").effect("shake");
    }

    function showAlertCaptcha() {
        $("#txtCaptcha").effect("shake");
    }
</script>

<?php
	$script = ob_get_clean();
	include('application/views/template_login.php');
	ob_flush();
?>