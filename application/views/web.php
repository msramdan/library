<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from nauthemes.net/html/maktab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jun 2022 04:22:55 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="<?= base_url() ?>assets/template/assets/images/favicon.png" sizes="35x35" type="image/png">
    <title>E-Library</title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/assets/css/color.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>
    <div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
    <?php if ($this->session->flashdata('error')) : ?>
    <?php endif; ?>

    <main>
        <header class="stick style1 w-100">
            <div class="topbar bg-color1 d-flex flex-wrap justify-content-center w-100">
                <ul class="topbar-info-list mb-0 list-unstyled d-inline-flex">

                    <?php
                    $user_session = $this->session->userdata('user_web');
                    if ($user_session) { ?>
                        <li>Selamat Datang, <span class="thm-clr"><?= $this->session->userdata('nama_user_web')  ?></span></li>
                        <li> <a href="<?= base_url() ?>web/logout">Logout</a> </li>
                    <?php } else { ?>
                        <li><a type="button" class="" data-toggle="modal" data-target="#exampleModal">
                                Login Aplikasi
                            </a>
                        </li>
                        <li></li>
                    <?php } ?>


                </ul>

                <!-- Modal Login -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login Aplikasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('web/login') ?>" method="post">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div><!-- Topbar -->
            <div class="logo-menu-wrap d-flex flex-wrap justify-content-between w-100">
                <div class="logo position-relative thm-layer opc7 back-blend-multiply thm-bg" style="background-image: url(<?= base_url() ?>assets/template/assets/images/pattern-bg.jpg);">
                    <h1 class="mb-0"><a href="<?= base_url() ?>web" title="Home"><img class="img-fluid" src="<?= base_url() ?>assets/template/assets/images/logo.png" alt="Logo" srcset="<?= base_url() ?>assets/template/assets/images/retina-logo.png"></a></h1>
                </div><!-- Logo -->
                <nav class="d-flex flex-wrap align-items-center justify-content-center">
                    <div class="header-left">
                        <ul class="mb-0 list-unstyled d-inline-flex">
                            <li><a href="<?= base_url() ?>web" title="">Home</a></li>
                            <li><a href="<?= base_url() ?>web/modul" title="">Modul Pembelajaran</a></li>
                            <li><a href="<?= base_url() ?>web/video" title="">Video Pembelajaran</a></li>
                            <!-- <li><a href="<?= base_url() ?>web/saran" title="">Saran Masukan</a></li> -->
                        </ul>
                    </div>
                    <div class="header-right">
                        <a class="thm-btn thm-bg" href="https://almaarif.sch.id/" title="" target="_blank">Website Sekolah<span></span><span></span><span></span><span></span></a>
                    </div>
                </nav>
            </div><!-- Logo Menu Wrap -->
        </header><!-- Header -->
        <div class="rspn-hdr">
            <div class="lg-mn">
                <div class="logo"><a href="<?= base_url() ?>web" title="Home"><img src="<?= base_url() ?>assets/template/assets/images/logo3.png" alt="Logo"></a></div>
                <div class="rspn-cnt">
                    <span><i class="thm-clr far fa-envelope"></i><a href="javascript:void(0);" title="">perpus@gmail.com</a></span>
                    <span><i class="thm-clr fas fa-phone-alt"></i>0838-7473-1480</span>
                </div>
                <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
            </div>
            <div class="rsnp-mnu">
                <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
                <ul class="mb-0 list-unstyled w-100">
                    <li><a href="<?= base_url() ?>web" title="">Home</a></li>
                    <li><a href="<?= base_url() ?>web/modul" title="">Modul Pembelajaran</a></li>
                    <li><a href="<?= base_url() ?>web/video" title="">Video Pembelajaran</a></li>
                    <!-- <li><a href="<?= base_url() ?>web/saran" title="">Saran Masukan</a></li> -->
                    <li><a href="https://almaarif.sch.id/" title="" target="_blank">Website Sekolah</a></li>
                </ul>
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->
        <?php echo $contents ?>

        <div class="bottom-bar dark-bg2 text-center w-100">
            <p class="mb-0"><a href="index.html" title="Home">E-Library</a> SMK AL MA'ARIF CIKANDE<a href="" title="Nauthemes" target="_blank"></a></p>
        </div>
    </main>
    <script src="<?= base_url() ?>assets/template/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/slick.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/musicplayer-min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/js/custom-scripts.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/dataflash.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pagingType: 'first_last_numbers',
                paging: false,


            });
        });
    </script>
</body>

</html>