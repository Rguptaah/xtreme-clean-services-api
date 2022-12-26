<?php
require_once('../Helpers/lib.php');
if (isset($_SESSION['user_id'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login | <?= $full_name; ?></title>

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
                                <a href="index.php">
                                    <img src="assets/img/logo-icon.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="login-header">
                            <h3>Login <span><?= $full_name; ?></span></h3>
                            <p class="text-muted">Access to our dashboard</p>
                        </div>
                        <form action="verify_login" id="login_frm">
                            <div class="form-group">
                                <label class="control-label">Username or Email</label>
                                <input class="form-control" type="text" name="email" placeholder="Enter your username or email">
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit" id="login-btn">Login</button>
                            </div>
                        </form>
                        <div class="text-center forgotpass mt-4"><a href="forgot-password.php">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootadmin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <!-- <script src="assets/js/admin.js"></script> -->
    <script src="assets/js/lib.js"></script>
</body>

</html>