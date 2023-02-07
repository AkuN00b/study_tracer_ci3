<?php ob_start();?>

<form action="<?php echo site_url('Welcome/cek_login') ?>" method="POST" autocomplete="off">
    <div class="polman-form-login">
        <h4>Login Tracer Study</h4>
        <hr />

        <div class="form-group">
            <label for="txtUsername">
                Nomor Induk Mahasiswa (NIM)
                <span style="color: red;">*</span>
            </label>
            <input type="text" id="txtUsername" name="txtUsername" maxlength="10" class="form-control" required="" 
                    oninvalid="this.setCustomValidity('Nomor Induk Mahasiswa (NIM) Wajib Diisi')"
                    oninput="this.setCustomValidity('')">
        </div>

        <div class="form-group">
            <label for="txtPassword">
                Kata Sandi
                <span style="color: red;">*</span>
            </label>
            <input id="txtPassword" type="password" name="txtPassword" class="form-control" required
                    oninvalid="this.setCustomValidity('Kata Sandi Wajib Diisi')"
                    oninput="this.setCustomValidity('')">
        </div>

        <button id="btnLogin" class="btn btn-primary" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">Masuk</button>
        <span style="margin-top: 10px;">Belum Terdaftar Sebagai Alumni? <a href='<?php echo site_url('Welcome/register'); ?>'>Klik disini</a>.</span>
    </div>
</form>

<?php
	$data = ob_get_clean();
?>

<?php ob_start();?>

<script type="text/javascript">
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