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

<!-- Navigation-->
<!--<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">-->
<!--    <div class="container">-->
<!--        <a class="navbar-brand js-scroll-trigger" href="#page-top">HOME</a>-->
<!--        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarResponsive">-->
<!--            <ul class="navbar-nav ml-auto my-2 my-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#about">Sign in</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#services">Sign up</a>-->
<!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>-->
                <!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3navbar  sticky-top bg-nav flex-md-nowrap p-0 navbar-expand-md fixed-top py-3">
<!--    <div class="container">-->
        <a class="navbar-brand js-scroll-trigger text-white nav-bar" href="#page-top">HOME</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-bar" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <?php $email = $this->session->email; ?>
                    <a class="nav-link js-scroll-trigger text-white" ><?=$email?></a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger text-white" href="#services">Sign up</a>-->
<!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>-->
                <!--                </li>-->
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>-->
                <!--                </li>-->
            </ul>
        </div>
<!--    </div>-->
</nav>

<!--<nav class="navbar navbar-dark sticky-top bg-nav flex-md-nowrap p-0 navbar-expand-md">-->
<!--    <div class="navbar-brand d-flex align-items-center justify-content-between col-sm-12 col-md-2 mr-0">-->
<!--        <a class="mr-1 d-md-none text-light" href="#sidenav" data-toggle="collapse" data-target="#sidenav">-->
<!--            <span data-feather="menu" class="my-1"></span>-->
<!--        </a>-->
<!--        <a class="text-light" href="">Company</a>-->
<!--        <a class="navbar-toggler border-0 p-0" href="#topnav" data-toggle="collapse" data-target="#topnav">-->
<!--            <span data-feather="menu" class="my-1"></span>-->
<!--        </a>-->
<!--    </div>-->
<!--    <div class="navbar-collapse collapse" id="topnav"">-->
        <!--        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
<!--        <ul class="navbar-nav px-3 py-2">-->
<!--            <li class="nav-item text-nowrap " >-->
<!--                <a class="nav-link"></a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!---->
<!--    <ul class="navbar-nav px-3 py-2">-->
<!--        <li class="nav-item text-nowrap " >-->
<!--            <a class="nav-link" href="#">Sign out</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->

<div class="container-fluid">
    <div class="row navbar-expand-md">
<!--        <nav class="col-md-3 col-lg-2 bg-light navbar-collapse collapse sidebar" id="sidenav">-->
            <div id="sidebar-container" class="sidebar-expanded  d-md-block">
                <ul class="list-group ">
                    <!-- Bootstrap List Group -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed main-menu"><small>MAIN MENU</small></li>
                    <a href="#submenu1" data-tooltip="true" data-placement="top" title="" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-cog fa-fw mr-3"></span><span class="menu-collapsed">Manage</span><span class="fa fa-caret-down ml-auto"></span></div>
                    </a>
                    <div id="submenu1" class="collapse sidebar-submenu">
                        <a href="<?=base_url('camera/show_camera')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">camera</span></a>
                        <a href="<?=base_url('group/show_all_group')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">group</span></a>
                    </div>
                    <a href="#submenu2" data-tooltip="true" data-placement="top" title="" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-users fa-fw mr-3"></span><span class="menu-collapsed">Utility</span><span class="fa fa-caret-down ml-auto"></span></div>
                    </a>
                    <div id="submenu2" class="collapse sidebar-submenu">
                        <a href="<?=base_url('person/found_person')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">found person</span></a>
                        <a href="<?=base_url('person/track_person')?>" data-tooltip="true" data-placement="top" title="" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">track person</span></a>
                    </div>
                    <a href="<?=base_url('profile/logout')?>" data-tooltip="true" data-placement="top" title="" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-sign-out-alt fa-fw mr-3"></span><span class="menu-collapsed">Sign out</span><span class=" ml-auto"></span></div>
                    </a>
<!--                    <div id="submenu2" class="collapse sidebar-submenu">-->
<!--                        <a href="newProject.php" data-tooltip="true" data-placement="top" title="Creat new project" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">new Project</span></a>-->
<!--                        <a href="sub02link" data-tooltip="true" data-placement="top" title="sub02tooltip" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">sub02title</span></a>-->
<!--                    </div>-->
<!--                    <li class="sidebar-separator menu-collapsed"></li>-->
<!--                    <a href="sub03link" data-tooltip="true" data-placement="top" title="tooltip1" class="bg-mac list-group-item list-group-item-action">-->
<!--                        <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-tachometer-alt fa-fw mr-3"></span><span class="menu-collapsed">title1</span></div>-->
<!--                    </a>-->
<!--                    <a href="#" data-toggle="sidebar-collapse" class="bg-mac list-group-item list-group-item-action d-flex align-items-center">-->
<!--                        <div class="d-flex w-100 justify-content-start align-items-center"><span id="collapse-icon" class="fa fa-2x mr-2 text-warning"></span><span id="collapse-text" class="menu-collapsed">Close Sidebar</span></div>-->
<!--                    </a>-->

                </ul>
<!--                <ul class="nav flex-column">-->
<!--                    <li class="nav-item">-->
<!--                        <h5 class="nav-link active" style="color: orangered" href="#">-->
<!--                            <span data-feather="home "></span> Dashboard <span class="sr-only">(current)</span>-->
<!--                        </h5>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file"></span> Orders-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="shopping-cart"></span> Products-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="users"></span> Customers-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="bar-chart-2"></span> Reports-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="layers"></span> Integrations-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->

<!--                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">-->
<!--                    <span>Saved reports</span>-->
<!--                    <a class="d-flex align-items-center text-muted" href="#">-->
<!--                        <span data-feather="plus-circle"></span>-->
<!--                    </a>-->
<!--                </h6>-->
<!--                <ul class="nav flex-column mb-2">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span> Current month-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span> Last quarter-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span> Social engagement-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">-->
<!--                            <span data-feather="file-text"></span> Year-end sale-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
            </div>
<!--        </nav>-->



