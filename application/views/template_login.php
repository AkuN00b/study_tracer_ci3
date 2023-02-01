<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

	<title><?php echo isset($title) ? $title . ' - Tracer Study' : 'Tracer Study' ; ?></title>

	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.png">
    <link href="<?php echo base_url() ?>assets/Plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/Plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/Content/jquery.fancybox.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/Content/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/Styles/Style.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/Scripts/tether/tether.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/jquery-ui-1.12.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/highcharts-more.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/modules/solid-gauge.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/LetterAvatar.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
</head>

<body style="background-image: url('<?php echo base_url() ?>assets/Images/IMG_Background.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="polman-nav-static-top" style="opacity: 0.9;">
        <div class="float-left">
            <a href="<?php echo site_url('/'); ?>">
                <img src="<?php echo base_url() ?>assets/image/IMG_Logo.png" style="height: 50px;" />
            </a>
        </div>
    </div>

    <?php echo $data; ?>

    <div class="mb-5"></div>

	<div class="mt-5" style="background-color: white; width: 100%; position: fixed; left: 0; bottom: 0;">
        <div class="container-fluid">
            <footer class="d-flex flex-wrap pt-3 pb-3 border-top">
                Copyright &copy; <?php echo date('Y'); ?> - MIS Politeknik Manufaktur Astra
            </footer>
        </div>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({
                    title: "Berhasil !!",
                    text: "<?php echo $this->session->flashdata('success'); ?>",
                    showConfirmButton: true,
                    icon: 'success'
                });
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({
                    title: "Gagal !!",
                    text: "<?php echo $this->session->flashdata('error'); ?>",
                    showConfirmButton: true,
                    icon: 'error'
                });
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('warning')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({
                    title: "Peringatan !!",
                    text: "<?php echo $this->session->flashdata('warning'); ?>",
                    showConfirmButton: true,
                    icon: 'warning'
                });
            });
        </script>
    <?php endif; ?>

	<?php echo $script; ?>

</body>
</html>