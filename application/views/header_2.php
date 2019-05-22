<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Face Recognition System</title>

    <!-- Font Awesome Icons -->
    <link href="<?=base_url().'public/'?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url().'public/'?>css.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url().'public/'?>profile_2.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed|Julius+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:700&display=swap" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="<?=base_url().'public/'?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?=base_url().'public/'?>css/creative.css" rel="stylesheet">

    <style>


    </style>
</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3navbar  sticky-top bg-nav flex-md-nowrap p-0 navbar-expand-md fixed-top py-3">


    <a class="navbar-brand js-scroll-trigger text-white nav-bar" href="#page-top"><h4 style="margin-bottom: 0;">Face Recognition System</h4></a>
<!--    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
    <div class="collapse navbar-collapse nav-bar" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item">
                <?php $email = $this->session->email; ?>
                <a class="nav-link js-scroll-trigger text-white" ><h6><?=$email?></h6></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row ">
        <div id="sidebar-container" style="position:fixed;">
            <div class="left">
                <div class="item" style="background-color: #1b1b1c !important;">
                    <i class="fas fa-fw fa-bars"></i>
                </div>
                <div class="item active" href="<?=base_url('group/show_all_group')?>">
                    <i class="fas far fa-camera mr-3"></i><a href="<?=base_url('camera/show_camera')?>" style="text-decoration:none; color: white;">camera</a>
                </div>

                <div class="item">
                    <i class="fas fa-users fa-fw mr-3"></i><a href="<?=base_url('group/show_all_group')?>" style="text-decoration:none; color: white">group</a>
                </div>
                <div class="item">
                    <i class="fas fa-user-check mr-3"></i><a href="<?=base_url('person/found_person')?>" style="text-decoration:none; color: white">found person</a>
                </div>
                <div class="item">
                    <i class="fas far fa-user-clock mr-3"></i><a href="<?=base_url('person/track_person')?>" style="text-decoration:none; color: white">track person</a>
                </div>
                <div class="item">
                    <i class="fas fa-sign-out-alt fa-fw mr-3"></i><a href="<?=base_url('profile/logout')?>" style="text-decoration:none; color: white">Sign out</a>
                </div>
            </div>

        </div>