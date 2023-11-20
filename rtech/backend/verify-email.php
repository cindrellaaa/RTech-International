<?php
session_start();
include('DBController.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verification_code, verify_status FROM registered_user WHERE verification_code = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0"){
            $clicked_token = $row['verification_code'];
            $update_query = "UPDATE registered_user SET verify_status='1' WHERE verification_code='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run){
                $_SESSION['status'] = "Your account has been verified successfully. Please login to continue";
                echo '<script>window.location.href = "../frontend/login.php";</script>';  
                exit(0);  
            }
            else{
                $_SESSION['status'] = "Verification Failed";
                echo '<script>window.location.href = "../frontend/login.php";</script>';  
                exit(0);  
            }
        }
        else{
            $_SESSION['status'] = "Email already verified. Please login.";
            echo '<script>window.location.href = "../frontend/login.php";</script>';  
            exit(0);          
        }
    }
    else{
        $_SESSION['status'] = "This token does not exist";
        echo '<script>window.location.href = "../frontend/login.php";</script>';
    }
}
else{
    $_SESSION['status'] = "Not Allowed";
    echo '<script>window.location.href = "../frontend/login.php";</script>';
}
?>