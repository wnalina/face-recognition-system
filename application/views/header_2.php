<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Font Awesome Icons -->
    <link href="<?=base_url().'public/'?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url().'public/'?>css.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url().'public/'?>profile.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?=base_url().'public/'?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?=base_url().'public/'?>css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<!--<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">-->
<!--    <div class="container">-->
<!--        <a class="navbar-brand js-scroll-trigger" href="#page-top">HOME</a>-->
<!--        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarResponsive">-->
<!--            <ul class="navbar-nav ml-auto my-2 my-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#about">Manage</a>-->
<!--                </li>-->
<!---->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        Manage-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <a class="dropdown-item" href="#camera">camera</a>-->
<!--                        <a class="dropdown-item" href="#group">group</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#">Something else here</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#contact">Logout</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 navbar-expand-md">
    <div class="navbar-brand d-flex align-items-center justify-content-between col-sm-12 col-md-2 mr-0">
        <a class="mr-1 d-md-none text-light" href="#sidenav" data-toggle="collapse" data-target="#sidenav">
            <span data-feather="menu" class="my-1"></span>
        </a>
        <a class="text-light" href="">Company</a>
        <a class="navbar-toggler border-0 p-0" href="#topnav" data-toggle="collapse" data-target="#topnav">
            <span data-feather="menu" class="my-1"></span>
        </a>
    </div>
    <div class="navbar-collapse collapse" id="topnav"  style="text-align: right">
<!--        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        <ul class="navbar-nav px-3 py-2">
            <li class="nav-item text-nowrap " >
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row navbar-expand-md">
        <nav class="col-md-3 col-lg-2 bg-light navbar-collapse collapse sidebar" id="sidenav">
            <div class="sidebar-sticky flex-column w-100 mt-1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <h5 class="nav-link active" style="color: orangered" href="#">
                            <span data-feather="home "></span> Dashboard <span class="sr-only">(current)</span>
                        </h5>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span> Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span> Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span> Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span> Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span> Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>