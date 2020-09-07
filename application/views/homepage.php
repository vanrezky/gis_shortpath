<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?= base_url('assets/img/' . $home->logo); ?>">
    <title><?= $home->nama_website ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= $home->deskripsi ?>">
    <!-- <meta name="keywords" content="Pelican HTML Template, Pelican Startup Business Template, Startup Template"> -->
    <link href="<?= base_url(); ?>assets/homepage/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900%7COpen+Sans:400" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/homepage/css/animate.css"> <!-- Resource style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/homepage/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/homepage/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/homepage/css/ionicons.min.css"> <!-- Resource style -->
    <link href="<?= base_url(); ?>assets/homepage/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="wrapper">
        <!-- Navbar Section -->
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <div class="container container">
                <a class="navbar-brand" href="#"><?= $home->nama_website ?></a>
                <img class="navbar-brand" src="<?= base_url('assets/img/' . $home->logo); ?>" style="width:50px;height:40px;">
                <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#main">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('login') ?>">Sign in</a></li>
                    </ul>
                </div>
            </div>
        </nav><!-- Navbar End -->


        <div id="main" class="main">
            <div class="hero">
                <div class="container">
                    <div class="row align-center">
                        <div class="col-md-12 col-lg-5">
                            <div class="hero-content">
                                <h5 class="d-none d-sm-block">Apa itu <?= $home->nama_website ?> ?</h5>
                                <h2>Televisi Kabel Pilihan Terbaik</h2>
                                <p><?= $home->deskripsi ?></p>
                                <div class="form-note">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 offset-lg-1">
                            <img class="img-fluid" src="<?= base_url(); ?>assets/homepage/images/tv.png" alt="Television">
                        </div>
                    </div>
                </div>
            </div>


            <div id="services" class="ar-ft-single">
                <div class="container-m">
                    <div class="ar-feature">
                        <div class="ar-list">
                            <ul>
                                <li>
                                    <div class="ar-icon">
                                        <img src="<?= base_url(); ?>assets/homepage/icons/p1.png" width="40" alt="Icon">
                                    </div>
                                    <div class="ar-text">
                                        <h3>Best Support</h3>
                                        <p>Team hangouts and instant text messaging right from the dashboard.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ar-icon">
                                        <img src="<?= base_url(); ?>assets/homepage/icons/p4.png" width="40" alt="Icon">
                                    </div>
                                    <div class="ar-text">
                                        <h3>Secure Servers</h3>
                                        <p>Team hangouts and instant text messaging right from the dashboard.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ar-icon">
                                        <img src="<?= base_url(); ?>assets/homepage/icons/p2.png" width="40" alt="Icon">
                                    </div>
                                    <div class="ar-text">
                                        <h3>Third feature</h3>
                                        <p>Team hangouts and instant text messaging right from the dashboard.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ar-image">
                            <img class="ar-img img-fluid" src="<?= base_url(); ?>assets/homepage/images/mapping.png" width="420" alt="Hero Image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pelican Reviews Ends -->


            <!-- Pelican Footer Section -->
            <div class="footer-sm">
                <div class="container-m">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="footer-logo" href="#"><?= $home->nama_website ?></a>
                        </div>
                        <div class="col-md-4">
                            <h6>&copy; <?= $home->nama_website ?> 2020 Rights Reserved</h6>
                        </div>
                        <div class="col-md-4">
                            <!-- <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Linkedin</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Scroll To Top -->
            <div id="back-top" class="bk-top">
                <div class="bk-top-txt">
                    <a class="back-to-top js-scroll-trigger" href="#main">Up</a>
                </div>
            </div>
            <!-- Scroll To Top Ends-->

        </div> <!-- Main -->
    </div><!-- Wrapper -->


    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/plugins.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/homepage/js/custom.js"></script>
    <!-- <script type="text/javascript" src="http://localhost:35729/livereload.js"></script> -->
</body>

</html>