<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Musical Equipment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/forms.css">
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
<section class="Form my-4 mx-5 text-center">
    <div class="container">
        <div class="row g-0 row-login">
            <div class="col-lg-5 img-container">
                <img src="/assets/img/login.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <h1 class="font-weight-bold py-3 logo-form"><img src="images/logo.png" height="50" class="d-inline-block align-top" alt="">Musical Equipment</h1>
                <h4>Sign into your account</h4>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li class='text-danger'> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form action="#" method="post">
                    <div class="form-row">
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" class="form-control my-3 p-3">
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" class="form-control my-3 p-3">
                    </div>
                    <div class="form-row">
                        <button type="submit" name="submit" class="btn-login mt-3" value="Login">Login</button>
                        <button type="button" class="btn-back mt-3 mb-5" onclick="location.href='https://musicalequipment.site/';" value="">
                            <i class="fas fa-arrow-circle-left"></i> Back</button>
                    </div>
                    <p>Don't have an account? <a href="/user/register/">Register Now</a> </p>
                </form>
            </div>
        </div>
    </div>
</section>


