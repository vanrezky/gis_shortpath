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