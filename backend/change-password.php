<?php
session_start();
include('DBController.php');

if (isset($_POST["change_password_btn"])) {
    $current_password = mysqli_real_escape_string($con, $_POST['cur_psw']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_psw']);
    
    $user = $_SESSION['auth_user'];

    // Check if the current password matches the user's stored password
    $password_query = "SELECT * FROM registered_user WHERE email='{$user['email']}' AND psw='$current_password'";
    $password_query_run = mysqli_query($con, $password_query);

    if (mysqli_num_rows($password_query_run) > 0) {
        // Update the user's password
        $update_query = "UPDATE registered_user SET psw='$new_password' WHERE email='{$user['email']}'";
        $update_query_run = mysqli_query($con, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = "Password updated successfully";
            echo '<script>window.location.href = "../frontend/user/dashboard.php";</script>';
            exit(0);
        } else {
            $_SESSION['status'] = "Failed to update password";
            echo '<script>window.location.href = "../frontend/user/dashboard.php";</script>';
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Current password is incorrect";
        echo '<script>window.location.href = "../frontend/user/dashboard.php";</script>';
        exit(0);
    }
}
?>