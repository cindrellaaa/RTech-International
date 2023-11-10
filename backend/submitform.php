<?php
session_start();
include('DBController.php');

if(isset($_POST["submit_btn"])){
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$passport = $_POST['passport'];
$pname = $_POST['pname'];
$psummary = $_POST['psummary'];
$puses = $_POST['puses'];
$pthesis = $_POST['pthesis'];
$pimg = $_POST['pimg'];
$pdemo = $_POST['pdemo'];
$pstatus = "Pending";

$email = $_SESSION['auth_user'];

//check for duplicate projects
$check_email_query = "SELECT p_name FROM project_details WHERE p_name = '$pname' LIMIT 1";
$check_email_query_run = mysqli_query($con,$check_email_query);
if(mysqli_num_rows($check_email_query_run) > 0)
{
$_SESSION['status'] = "Project Already Exists";
echo '<script>
window.location.href = "../frontend/user/projectform.php";
</script>';
}
else{
$query = "INSERT INTO project_details (email,p_name,p_summary,p_uses,p_thesis,p_img,p_demo,p_status) VALUES
('{$email['email']}','$pname','$psummary','$puses','$pthesis','$pimg','$pdemo','$pstatus')";
$query_run = mysqli_query($con,$query);

if (
    isset($_POST['phone']) && isset($_POST['dob']) &&
    isset($_POST['gender']) && isset($_POST['address']) &&
    isset($_POST['city']) && isset($_POST['state']) &&
    isset($_POST['zip']) && isset($_POST['passport'])
) {
    $user_query = "INSERT INTO user_details (email, phone, dob, gender, address, city, state, zip, passport) VALUES ('{$email['email']}', '$phone', '$dob', '$gender', '$address', '$city', '$state', '$zip', '$passport')";
    $user_query_run = mysqli_query($con, $user_query);
} else {
    // All input fields are disabled, so do nothing
}

$_SESSION['status'] = "Form Submitted Successfully.";
echo '<script>
window.location.href = "../frontend/user/project.php";
</script>';
}
}
?>