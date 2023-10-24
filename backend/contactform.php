<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone Number: $number\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message";

    $mailheader = "From: $email\r\n";
    $recipient = "cindrella@rtechglobal.ae";

    // Send the email
    if (mail($recipient, $subject, $email_body, $mailheader)) {
        echo '<script>alert("Message sent successfully")</script>';
        echo '<script>window.location = "../frontend/contact.html";</script>';
    } else {
        echo '<script>alert("Error sending the message")</script>';
        echo '<script>window.location = "../frontend/contact.html";</script>';
    }
}
?>