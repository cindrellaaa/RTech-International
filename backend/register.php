<?php
session_start();
include('DBController.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'C:\xampp\htdocs\rtech\vendor\autoload.php';

function sendemail_verify($name,$email,$verification_code){
    $mail = new PHPMailer(true);
    //Server settings                   
    $mail->isSMTP();
    $mail->SMTPAuth = true; 
                                               
    $mail->Host       = 'smtp.gmail.com';                                 
    $mail->Username   = 'orphanageotpsender@gmail.com';                
    $mail->Password   = 'bhikjccnaizfmxae';    
                    
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587;                                

    //Recipients
    $mail->setFrom('orphanageotpsender@gmail.com', $name);
    $mail->addAddress($email);  

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = "R-Tech Email Verification";
    $email_template = "
    <h3>You have registered with R-Tech International</h2>
    <h5>Verify your email to login with the link given below:</h5>
    <br>
    <a href='http://localhost/rtech/backend/register.php/verify-email.php?token=$verification_code'>Click Here To Verify</a>
    ";
    $mail->Body    = $email_template;
    $mail->send();
}

if(isset($_POST["register_btn"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $verification_code = md5(rand());

//check for duplicate email
$check_email_query = "SELECT email from registered_user WHERE email='$email' LIMIT 1";
$check_email_query_run = mysqli_query($con,$check_email_query);
if(mysqli_num_rows($check_email_query_run) > 0)
{
    $_SESSION['status'] = "Email Already Exists";
    echo '<script>window.location.href = "../frontend/signin.php";</script>';
}
else{
    $query = "INSERT INTO registered_user (name,email,psw,verification_code) VALUES ('$name','$email','$psw','$verification_code')";
    $query_run = mysqli_query($con,$query);

        if($query_run){
        sendemail_verify("$name","$email","$verification_code");
        $_SESSION['status'] = "Registration Successful. Please verify your email address.";
        echo '<script>window.location.href = "../frontend/signin.php";</script>';
        }
        else{
        $_SESSION['status'] = "Registration Failed";
        echo '<script>window.location.href = "../frontend/signin.php";</script>';
        }
    }
}
?>