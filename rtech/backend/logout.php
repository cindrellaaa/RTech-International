<?php
session_start();

unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
$_SESSION['status'] = "Log out successfull.";
echo '<script>window.location.href = "../frontend/login.php";</script>';
?>