<?php
session_start();

if (!isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "Please login to access user dashboard.";
    echo '<script>window.location.href = "../frontend/login.php";</script>';
    exit(0);
}
?>