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

    <!-- Plugin CSS -->
    <link href="<?=base_url().'public/'?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?=base_url().'public/'?>css/creative.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3navbar  sticky-top bg-nav flex-md-nowrap p-0 navbar-expand-md fixed-top py-3">

        <a class="navbar-brand js-scroll-trigger text-white nav-bar" href="#page-top"><h4 style="margin-bottom: 0">Face Recognition System</h4></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    <div class="row navbar-expand-md">
            <div id="sidebar-container" class="sidebar-expanded  d-md-block">
                <ul class="list-group ">
                    <!-- Bootstrap List Group -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed main-menu"><h5 style="margin-bottom: 0">MAIN MENU</h5></li>
                    <a href="#submenu1" data-tooltip="true" data-placement="top" title="" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-cog fa-fw mr-3"></span><span class="menu-collapsed"><h6>Manage</h6></span><span class="fa fa-caret-down ml-auto"></span></div>
                    </a>
                    <div id="submenu1" class="collapse sidebar-submenu">
                        <a href="<?=base_url('camera/show_camera')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed"><p class="h7">camera</p></span></a>
                        <a href="<?=base_url('group/show_all_group')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed"><p class="h7">group</p></span></a>
                    </div>
                    <a href="#submenu2" data-tooltip="true" data-placement="top" title="" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-users fa-fw mr-3"></span><span class="menu-collapsed"><h6>Utility</h6></span><span class="fa fa-caret-down ml-auto"></span></div>
                    </a>
                    <div id="submenu2" class="collapse sidebar-submenu">
                        <a href="<?=base_url('person/found_person')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed"><p class="h7">found person</p></span></a>
                        <a href="<?=base_url('person/track_person')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed"><p class="h7">track person</p></span></a>
                    </div>
                    <a href="<?=base_url('profile/logout')?>" data-tooltip="true" data-placement="top" title="" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-sign-out-alt fa-fw mr-3"></span><span class="menu-collapsed"><h6>Sign out</h6></span><span class=" ml-auto"></span></div>
                    </a>

                </ul>
            </div>
<!--        </nav>-->



