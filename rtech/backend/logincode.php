<?php
session_start();
include('DBController.php');

 if(isset($_POST["login_btn"]))
 {
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['psw'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $psw = mysqli_real_escape_string($con, $_POST['psw']);

        $login_query = "SELECT * FROM registered_user WHERE email='$email' AND psw='$psw' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $row = mysqli_fetch_array($login_query_run);
            if($row['verify_status'] == "1"){
                $_SESSION['authenticated'] = TRUE;
                $_SESSION['auth_user'] = [
                    'name' => $row['name'],
                    'email' => $row['email']
                ];
                $_SESSION['status'] = "Login Successful";
                echo '<script>window.location.href = "../frontend/user/dashboard.php";</script>';
                exit(0);
            }
            else{
                $_SESSION['status'] = "Please verify your email address to login.";
                echo '<script>window.location.href = "../frontend/login.php";</script>';
                exit(0);
            }
        }
        else{
            $_SESSION['status'] = "Invalid Email or Password";
            echo '<script>window.location.href = "../frontend/login.php";</script>';
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "All fields are mandatory";
        echo '<script>window.location.href = "../frontend/login.php";</script>';
        exit(0);
    }    
 }
?>