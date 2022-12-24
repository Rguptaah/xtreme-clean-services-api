<?php require_once('../Helpers/lib.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Forgot Password | <?= $full_name; ?></title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="login-page">
            <div class="login-body container">
                <div class="loginbox">
                    <div class="login-right-wrap">
                        <div class="account-header">
                            <div class="account-logo text-center mb-4">
                                <a href="index.html">
                                    <img src="assets/img/logo-icon.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="login-header">
                            <h3>Forgot Password? <span><?= $full_name; ?></span></h3>
                            <p class="text-muted">Enter your email to get a password reset link</p>
                        </div>
                        <form action="">
                            <div class="form-group mb-4">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email" placeholder="Enter your mail id">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit" id="reset-password">Reset Password</button>
                            </div>
                        </form>
                        <div class="text-center dont-have">Remember your password? <a href="login.php">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script>

    </script>