<?php ob_start();?>

<div class="container-fluid p-4" style="background-color: white; border-radius: 20px;">
    <form action="<?php echo site_url('Welcome/inputRegister') ?>" method="POST" autocomplete="off">
        <div class="row">
            <div class="col-md-4">
                <h4>Politeknik Manufaktur Astra</h4>
                <hr />

                <p>Polman Astra adalah sebuah lembaga pendidikan di bawah naungan Yayasan Astra Bina Ilmu (YABI), merupakan salah satu anak perusahaan PT Astra International, Tbk. Polman Astra berlokasi di Komplek Astra International, Tbk., Jalan Gaya Motor Raya no.8, Sunter II, Jakarta Utara, Jakarta 14330.</p><br>

                <h4>Lulusan Polman Astra</h4>
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
                            <input type="text" name="txtNIM" maxlength="10" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="txtNama">
                                Nama
                                <span style="color: red;">*</span>
                            </label>
                            <input type="text" name="txtNama" maxlength="100" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="txtNIK">
                                Nomor Induk Kependudukan (NIK)
                                <span style="color: red;">*</span>
                            </label>
                            <input type="text" name="txtNIK" maxlength="16" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txtTanggalLahir">
                                Tanggal Lahir
                                <span style="color: red;">*</span>
                            </label>
                            <input type="date" name="txtTanggalLahir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="txtTahunLulus">
                                Tahun Lulus
                                <span style="color: red;">*</span>
                            </label>
                            <select class="form-control" name="txtTahunLulus" id="txtTahunLulus">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtTelepon">
                                Nomor Telepon
                                <span style="color: red;">*</span>
                            </label>
                            <input type="number" onKeyPress="if(this.value.length == 13) return false;" name="txtTelepon" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txtEmail">
                                Email
                                <span style="color: red;">*</span>
                            </label>
                            <input type="email" maxlength="100" name="txtEmail" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="txtPassword">
                                Password
                                <span style="color: red;">*</span>
                            </label>
                            <input type="password" maxlength="50" id="txtPassword" name="txtPassword" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="txtKonfirmasiPassword">
                                Konfirmasi Password
                                <span style="color: red;">*</span><span style="color: red;" id="txtKonfirmasiPasswordMsg"></span>
                            </label>
                            <input type="password" maxlength="50" id="txtKonfirmasiPassword" name="txtKonfirmasiPassword" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="txtAlamat">
                                Alamat
                                <span style="color: red;">*</span>
                            </label>
                            <textarea name="txtAlamat" class="form-control" rows="10"></textarea>
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
            $("#txtKonfirmasiPasswordMsg").html("Password Tidak Cocok");
            $("#txtKonfirmasiPasswordMsg").show();
            error_password = true;
        } else {
            if (pw1 === pw2) {
                $("#txtKonfirmasiPasswordMsg").hide();
                error_password = false;
            } else {
                $("#txtKonfirmasiPasswordMsg").html("Password Tidak Cocok");
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