<?php
require_once('../Helpers/lib.php');
unset($_SESSION['user_id']);
session_destroy();
if (!isset($_SESSION['user_id']) and $_SESSION['user_id'] == null) {
    header('location:login.php');
}
