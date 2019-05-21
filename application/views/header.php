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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?=base_url().'public/'?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?=base_url().'public/'?>css/creative.css" rel="stylesheet">



</head>

<body style="overflow: hidden">

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
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->


<header class="masthead" style="padding-top: 0">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">

        <div class="login-wrap" style="color: #505357">

            <div class="login-html">
                <div class=" align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Face recognition system</h1>
                    <hr class="divider my-4">
                </div>
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><h4>Sign In</h4></label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><h4>Sign Up</h4></label>
                <?php echo validation_errors('<div class="error">', '</div>'); ?>


                <div class="login-form" style="max-width: 650px; margin: auto">
                    <?= form_open('profile/login', ''); ?>
                    <div class="sign-in-htm" >

                        <div class="group">
                            <label for="exampleInputEmail1" class="label"></label>
                            <input id="email" name="email" type="email" class="input" required  placeholder="Enter Email.">
                        </div>
                        <div class="group">
                            <label for="pass" class="label"></label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required placeholder="Enter Password">
                        </div>
<!--                        <div class="group">-->
<!--                            <input id="check" type="checkbox" class="check" checked>-->
<!--                            <label for="check"><span class="icon"></span> Keep me Signed in</label>-->
<!--                        </div>-->
                        <div class="group submit_botton">
                            <h5><input style="border-bottom: none" type="submit" class="button" value="Sign In"></h5>
                        </div>
                    </div>
                    <?= form_close(); ?>

                    <?= form_open_multipart("profile/sign_up", ''); ?>

                    <div class="sign-up-htm">

                        <div class="group">
                            <label for="validationTooltip01" class="label"></label>
                            <input id="firstname" name="firstname" type="text" class="input" required placeholder="First Name">
                        </div>
                        <div class="group">
                            <label for="validationTooltip01" class="label"></label>
                            <input id="lastname" name="lastname" type="text" class="input" required placeholder="Last Name">
                        </div>

                        <div class="group">
                            <label for="validationTooltipEmailPrepend" class="label"></label>
                            <input id="email" name="email" type="email" class="input" required placeholder="Email Address">
                        </div>
                        <div class="group">
                            <label for="validationTipPassword" class="label"></label>
                            <input id="password_signup" name="password_signup" type="password" class="input" data-type="password" placeholder="Password">
                        </div>
                        <div class="group">
                            <label for="validationTipPassword" class="label"></label>
                            <input id="confirm_password" name="confirm_password" type="password" class="input" data-type="password" required placeholder="Repeat Password">
                            <p style="font-size: 0.80rem; text-align: start !important;" id='message'></p>
                        </div>

                        <div class="group submit_botton"  >
                            <h5><input style="border-bottom: none" type="submit" class="button" value="Sign Up"></h5>
                        </div>

                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>


        </div>
        </div>
</header>



