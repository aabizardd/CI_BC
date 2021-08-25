<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/logoo2.jpg" type="img/logoo2.jpg">
        <title><?=$title;?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/linericon/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/responsive.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    </head>

    <body>
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
                <div class="container">

                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="index.php"><img
                                src="<?php echo base_url() ?>assetsAwal/img/logoo1.jpg" width="70px" alt=""></a>
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
                                <li class="nav-item submenu dropdown">
                                    <a class="nav-link" role="button" aria-haspopup="true"
                                        aria-expanded="false">Login</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('Auth/index/Konsumen');?>">Konsumen</a>
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('Auth/index/Clean');?>">Penyedia Jasa Clean</a>
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('Auth/index/Beauty');?>">Penyedia Jasa Beauty</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->