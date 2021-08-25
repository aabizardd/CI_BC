<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?=base_url('assetsAwal/')?>img/logoo1.jpg"
            type="<?=base_url('assetsAwal/')?>img/logoo1.jpg">
        <title></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>css/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/linericon/style.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>css/style.css">
        <link rel="stylesheet" href="<?=base_url('assetsAdmin/');?>css/responsive.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


    </head>

    <body>

        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
                <div class="container">
                    <div class="float-left">
                        <a href="mailto:BC@beauty_clean.com">BC@beauty_clean.com</a>
                    </div>

                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="indexadmin.php"><img
                                src="<?=base_url('assetsAwal/')?>img/logoo1.jpg" width="70" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">

                                <?php if ($this->session->userdata('role_id') == "Clean"): ?>

                                <li class="nav-item ">
                                    <a class="nav-link" href="<?=base_url('pjasa')?>">Pengelola Data Jasa Clean</a>
                                </li>
                                <?php elseif ($this->session->userdata('role_id') == "Beauty"): ?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?=base_url('pjasa/indexbeauty')?>">Pengelola Data
                                        Jasa
                                        Beauty</a>
                                </li>

                                <?php endif;?>

                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Pesanan</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('pjasa/pesananMasuk')?>">Pesanan
                                                Masuk</a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('pjasa/pesananOnProgress')?>">Pesanan On Progress</a>
                                        </li>

                                        <li class="nav-item ">
                                            <a class="nav-link" href="<?=base_url('pjasa/riwayat')?>">Riwayat
                                                Pekerjaan</a>
                                        </li>
                                    </ul>
                                </li>


                                <!-- <li class="nav-item ">
                                    <a class="nav-link" href="<?=base_url('pjasa/riwayat')?>">Riwayat Pekerjaan</a>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('Auth/logout')?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!--================Header Menu Area =================-->