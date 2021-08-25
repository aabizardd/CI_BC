<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?=base_url('assetsAwal/')?>img/logoo1.jpg"
            type="<?=base_url('assetsAwal/')?>img/logoo1.jpg">
        <title>BCin aja</title>
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
                        <a class="navbar-brand logo_h" href="<?=base_url('awal')?>"><img
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
                                <li class="nav-item"><a class="nav-link" href="<?=base_url('awal');?>">Home</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="<?=base_url('Clean');?>" class="nav-link" role="button"
                                        aria-haspopup="true" aria-expanded="false">Clean</a>

                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="<?=base_url('Beauty');?>" class="nav-link" role="button"
                                        aria-haspopup="true" aria-expanded="false">Beauty</a>

                                </li>

                                <li class="nav-item submenu dropdown">
                                    <a href="<?=base_url('awal/daftar_pesanan')?>" class="nav-link" role="button"
                                        aria-haspopup="true" aria-expanded="false">Daftar Pemesanan</a>

                                </li>


                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Profile</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('awal/editprofile')?>">My Profile</a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('awal/editPassword')?>">Edit Password</a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('awal/history')?>">History</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?=base_url('Auth/logout')?>">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
