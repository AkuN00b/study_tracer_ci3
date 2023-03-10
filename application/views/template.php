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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/Scripts/tether/tether.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/jquery-ui-1.12.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/highcharts-more.js"></script>
    <script src="<?php echo base_url() ?>assets/Plugins/Highcharts-5.0.14/code/modules/solid-gauge.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/LetterAvatar.js"></script>
    <script src="<?php echo base_url() ?>assets/Scripts/tableToExcel.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript">
        $(function () {
            $("[data-toggle=tooltip").tooltip();
        })

        $(function () {
            $('[rel="tooltip"]').tooltip()
        })

        $(function () {
            $('[data-toggle="popover"]').popover()
        })

        function redirectNotifikasi() {
            // window.location.href = 'Page_Notifikasi.aspx';
        }

        function sentValidation(input) {
            // $(input).addClass('disabled');
            // $(input).text('Mohon tunggu..');
        }

        function pageLoad(sender, args) {
            // $('.selectpicker').selectpicker();
            // katweKibsAvatar.init({
            //     dataChars: 2
            // });
        }

        function refreshChart() {
            // try { $('#container1').highcharts().setSize(undefined, undefined, false); } catch (err) { }
            // try { $('#container2').highcharts().setSize(undefined, undefined, false); } catch (err) { }
            // try { $('#container3').highcharts().setSize(undefined, undefined, false); } catch (err) { }
        }
    </script>

    <script src="<?php echo base_url() ?>assets/Scripts/jquery.floatThead.js"></script>

    <style>
        .mce-branding-powered-by {
            display: none;
        }

        table {
            border-top: none;
            border-bottom: none;
            background-color: #FFF;
            white-space: nowrap;
        }

        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: #FFF;
        }

        .table-striped tbody tr:nth-of-type(2n), thead {
            background-color: #ECECEC;
        }

        .table-striped tbody tr.pagination-ys {
            background-color: #FFF;
        }

        .bottom-wrapper {
            margin-top: 1em;
        }

        div.dataTables_filter > label > input {
            
        }

        .btn:hover {
          cursor: pointer;
        }
    </style>

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
</head>
<body>
	<div class="polman-nav-static-top">
		<div class="float-left">
			<a href="<?php echo site_url('Admin'); ?>">
				<img src="<?php echo base_url() ?>assets/Images/IMG_Logo.png" style="height: 50px;" />
			</a>
		</div>

		<div class="polman-menu">
			<div style="padding-top: 15px; margin-right: -30px;">
                Hai,&nbsp;<b><?php echo $this->session->userdata('user_nama'); ?></b>
            </div>
		</div>

		<div class="polman-menu-bar">
            <div class="float-right">
                <div class="fa fa-bars fa-2x" style="margin-top: 9px; cursor: pointer;" aria-hidden="true" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu"></div>
            </div>
        </div>
    </div>

    <div class="polman-nav-static-right collapse scrollstyle" id="menu">
        <div id="accordions" role="tablist" aria-multiselectable="true">
            <div class="list-group">
                <a class="list-group-item list-group-item-action polman-username" style="border-radius: 0px; border: none; background-color: #EEE;">
                    Hai,&nbsp;<b><?php echo $this->session->userdata('user_nama'); ?></b>
                </a>

                <a href="<?php echo site_url('admin/logout'); ?>" class="list-group-item list-group-item-action" style="border-radius: 0px; border: none; padding-left: 23px;">
                    <i class="fa fa-sign-out fa-lg fa-pull-left"></i>Logout
                </a>

                <a href='<?php echo site_url('Admin'); ?>' class='list-group-item list-group-item-action 
                    <?php echo $title == 'Dashboard Admin' ? 'polman-menu-active' : ''; ?>'
                    style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                </a>

                <a href='#menu1' role='tab' class='list-group-item list-group-item-action' data-toggle='collapse' data-parent='#accordion' aria-expanded='true' aria-controls='menu1' style='border-radius: 0px; border: none;'>
                    <i class='fa fa-chevron-down fa-lg fa-pull-left'></i>Kuesioner
                </a>

                <div id='menu1' class='collapse 
                    <?php echo $title == 'Pertanyaan Kuesioner' ? 'show' : ''; ?>
                    <?php echo $title == 'Jawaban Kuesioner' ? 'show' : ''; ?>
                    <?php echo $title == 'Detail Jenis Periode' ? 'show' : ''; ?>
                    <?php echo $title == 'Detail Pertanyaan Jawaban' ? 'show' : ''; ?>
                    <?php echo $title == 'Daftar Urutan Data' ? 'show' : ''; ?>' 
                    role='tabpanel'>  

                    <a href='<?php echo site_url('DetailJenisPeriode'); ?>' class='list-group-item list-group-item-action 
                        <?php echo $title == 'Detail Jenis Periode' ? 'polman-menu-active' : ''; ?>'
                        style='border-radius: 0px; border: none; padding-left: 47px; display: inherit;'>

                        <i class='fa fa-calendar-check-o fa-lg fa-pull-left' style="margin-top: 2px;"></i>Detail Jenis Periode
                    </a>

                    <a href='<?php echo site_url('PertanyaanKuesioner'); ?>' class='list-group-item list-group-item-action 
                        <?php echo $title == 'Pertanyaan Kuesioner' ? 'polman-menu-active' : ''; ?>'
                        style='border-radius: 0px; border: none; padding-left: 47px; display: inherit;'>

                        <i class='fa fa-question-circle fa-lg fa-pull-left' style="margin-top: 2px;"></i>Pertanyaan Kuesioner
                    </a>

                    <a href='<?php echo site_url('JawabanKuesioner'); ?>' class='list-group-item list-group-item-action 
                        <?php echo $title == 'Jawaban Kuesioner' ? 'polman-menu-active' : ''; ?>'
                        style='border-radius: 0px; border: none; padding-left: 47px; display: inherit;'>

                        <i class='fa fa-info-circle fa-lg fa-pull-left' style="margin-top: 2px;"></i>Jawaban Kuesioner
                    </a>

                    <a href='<?php echo site_url('DetailPertanyaanJawaban'); ?>' class='list-group-item list-group-item-action 
                        <?php echo $title == 'Detail Pertanyaan Jawaban' ? 'polman-menu-active' : ''; ?>'
                        style='border-radius: 0px; border: none; padding-left: 47px; display: inherit;'>

                        <i class='fa fa-plus-circle fa-lg fa-pull-left' style="margin-top: 2px;"></i>Detail Pertanyaan Jawaban
                    </a>

                    <a href='<?php echo site_url('DaftarUrutanData'); ?>' class='list-group-item list-group-item-action 
                        <?php echo $title == 'Daftar Urutan Data' ? 'polman-menu-active' : ''; ?>'
                        style='border-radius: 0px; border: none; padding-left: 47px; display: inherit;'>

                        <i class='fa fa-list-ol fa-lg fa-pull-left' style="margin-top: 2px;"></i>Daftar Urutan Data
                    </a>
                </div>

                <a href='<?php echo site_url('LaporanKuesionerExcel'); ?>' class='list-group-item list-group-item-action 
                    <?php echo $title == 'Laporan Kuesioner Excel' ? 'polman-menu-active' : ''; ?>'
                    style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>

                    <i class='fa fa-file-excel-o fa-lg fa-pull-left'></i>Laporan Kuesioner Excel
                </a>

                <a href='<?php echo site_url('Pengingat'); ?>' class='list-group-item list-group-item-action 
                    <?php echo $title == 'Pengingat' ? 'polman-menu-active' : ''; ?>'
                    style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>

                    <i class='fa fa-bell fa-lg fa-pull-left'></i>Pengingat
                </a>

                <a href='<?php echo site_url('KonfirmasiAkun'); ?>' class='list-group-item list-group-item-action 
                    <?php echo $title == 'Konfirmasi Akun' ? 'polman-menu-active' : ''; ?>'
                    style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>

                    <i class='fa fa-check-circle fa-lg fa-pull-left'></i>Konfirmasi Akun
                </a>
            </div>
        </div>
    </div>

	<div class="polman-adjust5">
        <ol class="breadcrumb polman-breadcrumb">
            <li class="breadcrumb-item"><a href="https://sia.polman.astra.ac.id/sso" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Menuju Hal SSO">Tracer Study</a></li>
            <li class="breadcrumb-item"><?php echo isset($title2) ? $title2 : $title; ?></li>
        </ol>

        <hr />

        <?php echo $data; ?>
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

    <script type="text/javascript">        
        $(document).ready(function () {
            $('#myTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada Data <?php echo $title; ?>"
                },
                "dom": 'lfrti<"bottom-wrapper"p>',
                scrollX: true,
                "bLengthChange": false,
                "bInfo": false,
                "pageLength": 10
            });
        });
    </script>

    <script language="Javascript" type="text/javascript">
        function allowAlphaNumericSpace(e) {
            var code = ('charCode' in e) ? e.charCode : e.keyCode;

            if (!(code > 47 && code < 58) && // numeric (0-9)
                !(code > 64 && code < 91) && // upper alpha (A-Z)
                !(code > 96 && code < 123)) { // lower alpha (a-z)
                    e.preventDefault();
            }
        }
    </script> 

    <script type="text/javascript">
        let valueDisplays = document.querySelectorAll(".num");

        valueDisplays.forEach((valueDisplay) => {
            let startValue = 0;
            let endValue = parseInt(valueDisplay.getAttribute("data-val"));

            let counter = setInterval(function () {
                startValue += 1;
                valueDisplay.textContent = startValue;

                if (startValue == endValue) {
                    clearInterval(counter);
                }
            }, 69);
        });
    </script>

    <script>
        AOS.init();
    </script>

	<script>
        // function cekExt(param) {
        //     var input, file, valid = true;
        //     input = param;
        //     file = input.files[0];
        //     if (file.size / 1024 > 5120) {
        //         alert("Opps! Berkas file terlalu besar! Ukuran maksimal berkas yang bisa dikirim adalah 5 MB");
        //         valid = false;
        //     }
        //     var a = input.value.split(".").pop();
        //     if (a.toLowerCase() != "jpg" && a.toLowerCase() != "png" && a.toLowerCase() != "pdf" && a.toLowerCase() != "zip" && a.toLowerCase() != "rar") {
        //         alert("Opps! Format berkas " + deskripsi + " yang dibolehkan adalah .jpg, .png, .pdf, .zip atau .rar");
        //         valid = false;
        //     }
        //     if (!valid) {
        //         param.value = "";
        //     }
        // }

        // $(document).ready(function () {
        //     var id = 123;
        //     $('.readmore').each(function () {
        //         var limit = 100;
        //         var text = $(this).text();
        //         if (text.length > limit) {
        //             var sub = text.substring(0, limit);
        //             var next = text.substring(limit);
        //             $(this).html(
        //                 sub +
        //                 "<span style='display:none;' id='readmore-" + id + "'>" + next + "</span>" +
        //                 "<br/><a onclick=\"$('#readmore-" + id + "').toggle(300);$(this).hide(300);\" style='color: blue; font-weight: bold; cursor: pointer;'>Selengkapnya</a>"
        //             );
        //         }
        //         id++;
        //     });

        //     $('.centang').each(function () {
        //         if ($(this).text() == 'Ya') {
        //             $(this).html('<i class="fa fa-check" aria-hidden="true"></i>');
        //         }
        //         else if ($(this).text() == 'Tidak') {
        //             $(this).html('<i class="fa fa-times" aria-hidden="true"></i>');
        //         }
        //     });
        // });
    </script>

    <script type="text/javascript">
        /*$(document).ready(function () {
            $('.table').each(function () {
                if ($(this).attr('id') != 'tabeljadwal') {
                    var x = $(this).find('tbody tr').eq(0).html();
                    $(this).append('<thead><tr>' + x + '</tr></thead>');
                    $(this).find('tbody tr').eq(0).remove();
                    if (!$(this).parents('.modal').length)
                        $('table').floatThead({
                            responsiveContainer: function ($table) {
                                return $table.closest(".scrollstyle");
                            },
                            top: 70,
                            zIndex: 2
                        });
                }
            });
        });
        var prm = Sys.WebForms.PageRequestManager.getInstance();

        prm.add_endRequest(function () {
            $('.table').each(function () {
                if ($(this).attr('id') != 'tabeljadwal') {
                    var x = $(this).find('tbody tr').eq(0).html();
                    $(this).append('<thead><tr>' + x + '</tr></thead>');
                    $(this).find('tbody tr').eq(0).remove();
                    if (!$(this).parents('.modal').length)
                        $('table').floatThead({
                            responsiveContainer: function ($table) {
                                return $table.closest(".scrollstyle");
                            },
                            top: 70,
                            zIndex: 2
                        });
                }
            });
        });*/
    </script>

    <?php echo $script; ?>
</body>
</html>