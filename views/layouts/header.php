<?php $page = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Musical Equipment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <link rel="icon" type="image/png" href="/assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/ico" href="/assets/img/icons/favicon.ico">
    <link rel="apple-touch-icon" href="/assets/img/icons/apple-touch-icon.png">
    <link rel=”mask-icon” href=”/assets/img/icons/guitar.svg”>
    <link rel="shortcut icon" href="/assets/img/icons/android-chrome-512x512.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css">
</head>

<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow shift">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="/">
            <i class="fas fa-headphones"></i>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#site_main_nav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="site_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page == '/'){ echo 'active"';}?>" href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page == '/about/'){ echo 'active"';}?>" href="/about/">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page == '/catalog/'){ echo 'active"';}?>" href="/catalog/">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page == '/contacts/'){ echo 'active"';}?>" href="/contacts/">CONTACT</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <a class="nav-icon position-relative text-decoration-none" href="/cart/">
                    <i class="fa fa-fw fa-cart-arrow-down mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php echo Cart::countItems(); ?></span>
                </a>
                <?php if (User::isGuest()): ?>
                    <a class="nav-icon position-relative text-decoration-none" href="/user/login/">
                        <i class="fa fa-fw fas fa-sign-in-alt"></i></a>
                <?php else: ?>
                    <a class="nav-icon position-relative text-decoration-none" href="/cabinet/">
                        <i class="fa fa-fw fa fa-user"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="/user/logout/">
                        <i class="fa fa-fw fas fa-sign-out-alt"></i>
                    </a>
                <?php endif; ?>

            </div>
        </div>

    </div>
</nav>
<div class="min-height">
<!-- Close Header -->
