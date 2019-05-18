<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Face recognition system</h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger sign_in_botton" href="#about">Sign in</a>
                <a class="btn btn-primary btn-xl js-scroll-trigger sign_up_botton" href="#services">Sign up</a>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class=" justify-content-center">
            <div class=" text-center">
                <h2 class="text-white mt-0  font">SIGN IN</h2>
                <hr class="divider light my-4">
<!--                <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>-->


            </div>

            <?php echo validation_errors('<div class="error">', '</div>'); ?>

            <?= form_open('profile/login', 'class="sing_in_form col-md-6 mb-3"'); ?>
            <form >
                <div class="form-group">
                    <label for="exampleInputEmail1 text-white"></label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1 text-white"></label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">

                </div>
<!--                <div class="form-group form-check">-->
<!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--                </div>-->
                <div class="submit_botton">
                <button type="submit" class="btn btn-light btn-xl js-scroll-trigger ">Submit</button>
                </div>

            </form>
            <?= form_close(); ?>



        </div>


    </div>
</section>

<!-- Services Section -->
<section class="page-section" id="services">
    <div class="container">
        <div class=" justify-content-center">
            <h2 class="text-center mt-0 font">SIGN UP</h2>
            <hr class="divider my-4">

            <?php echo validation_errors('<div class="error">', '</div>'); ?>

            <?= form_open_multipart("profile/sign_up", 'class="sing_in_form col-md-6 mb-3"'); ?>

            <form class="needs-validation sing_in_form col-md-6 mb-3" novalidate>
    <!--            <div class="form-row">-->
                    <div class="mb-3">
                        <label for="validationTooltip01"></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTooltip02"></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTooltipEmailPrepend"></label>
                        <div class="input-group">
    <!--                        <div class="input-group-prepend">-->
    <!--                            <span class="input-group-text" id="validationTooltipEmailPrepend">@</span>-->
    <!--                        </div>-->
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="validationTooltipEmailPrepend" required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid email.
                            </div>
                        </div>
                    </div>
    <!--            </div>-->
    <!--            <div class="form-row">-->
                    <div class="mb-3">
                        <label for="validationTipPassword"></label>
                        <input type="text" class="form-control" id="password"  name="password" placeholder="Password" required>
                        <div class="invalid-tooltip">
                            Please choose a valid password.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationTipConfirmPassword"></label>
                        <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                        <div class="invalid-tooltip">
                            Please provide a valid password.
                        </div>
                    </div>

    <!--            </div>-->
                <div class="submit_botton">
                    <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Submit</button>
                </div>
            </form>

            <?= form_close(); ?>
        </div>


<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-3 col-md-6 text-center">-->
<!--                <div class="mt-5">-->
<!--                    <i class="fas fa-4x fa-gem text-primary mb-4"></i>-->
<!--                    <h3 class="h4 mb-2">Sturdy Themes</h3>-->
<!--                    <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 text-center">-->
<!--                <div class="mt-5">-->
<!--                    <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>-->
<!--                    <h3 class="h4 mb-2">Up to Date</h3>-->
<!--                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 text-center">-->
<!--                <div class="mt-5">-->
<!--                    <i class="fas fa-4x fa-globe text-primary mb-4"></i>-->
<!--                    <h3 class="h4 mb-2">Ready to Publish</h3>-->
<!--                    <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 text-center">-->
<!--                <div class="mt-5">-->
<!--                    <i class="fas fa-4x fa-heart text-primary mb-4"></i>-->
<!--                    <h3 class="h4 mb-2">Made with Love</h3>-->
<!--                    <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>

<!-- Portfolio Section -->
<!--<section id="portfolio">-->
<!--    <div class="container-fluid p-0">-->
<!--        <div class="row no-gutters">-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/1.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/1.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/2.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/2.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/3.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/3.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/4.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/4.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/5.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/5.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-sm-6">-->
<!--                <a class="portfolio-box" href="--><?//=base_url().'public/'?><!--img/portfolio/fullsize/6.jpg">-->
<!--                    <img class="img-fluid" src="--><?//=base_url().'public/'?><!--img/portfolio/thumbnails/6.jpg" alt="">-->
<!--                    <div class="portfolio-box-caption p-3">-->
<!--                        <div class="project-category text-white-50">-->
<!--                            Category-->
<!--                        </div>-->
<!--                        <div class="project-name">-->
<!--                            Project Name-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!-- Call to Action Section -->
<!--<section class="page-section bg-dark text-white">-->
<!--    <div class="container text-center">-->
<!--        <h2 class="mb-4">Free Download at Start Bootstrap!</h2>-->
<!--        <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>-->
<!--    </div>-->
<!--</section>-->

<!-- Contact Section-->
<!--<section class="page-section" id="contact">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-8 text-center">-->
<!--                <h2 class="mt-0">Let's Get In Touch!</h2>-->
<!--                <hr class="divider my-4">-->
<!--                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 ml-auto text-center">-->
<!--                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>-->
<!--                <div>+1 (202) 555-0149</div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 mr-auto text-center">-->
<!--                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>-->
                <!-- Make sure to change the email address in anchor text AND the link below! -->
<!--                <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

