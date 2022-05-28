<?php
include_once("../inc/conn.php");
// Connection Created Successfully

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();

// Store All Errors
$errors = [];

// if Verify Button Clicked
if (isset($_POST['verify'])) {
    $_SESSION['message'] = "";
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);
    $otp_query = "SELECT * FROM usersInfo WHERE code = $otp";
    $otp_result = mysqli_query($conn, $otp_query);

    if (mysqli_num_rows($otp_result) > 0) {
        $fetch_data = mysqli_fetch_assoc($otp_result);
        $fetch_code = $fetch_data['code'];

        $update_status = "Verified";
        $update_code = 0;

        $update_query = "UPDATE usersInfo SET status = '$update_status' , code = $update_code WHERE code = $fetch_code";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            header('location: login.php');
        } else {
            $errors['db_error'] = "Failed To Insering Data In Database!";
        }
    } else {
        $errors['otp_error'] = "You enter invalid verification code!";
    }
}

// if forgot button will clicked
if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $emailCheckQuery = "SELECT * FROM user WHERE email = '$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    // if query run
    if ($emailCheckResult) {
        // if email matched
        if (mysqli_num_rows($emailCheckResult) > 0) {
            $code = rand(999999, 111111);
            $_SESSION['code'] = $code;
            if (isset($_SESSION['code'])) {
                $subject = 'Email Verification Code';
                $message = "Our verification code is $code";
                $sender = 'From: aastulibraryproject@gmail.com';

                if (1) {

                    $mail = new PHPMailer(true);

                    //Enable SMTP debugging.
                    $mail->SMTPDebug = false;
                    //Set PHPMailer to use SMTP.
                    $mail->isSMTP();
                    //Set SMTP host name                          
                    $mail->Host = "smtp.gmail.com";
                    //Set this to true if SMTP host requires authentication to send email
                    $mail->SMTPAuth = true;
                    //Provide username and password     
                    $mail->Username = "aastulibraryproject@gmail.com";
                    $mail->Password = "1234Abcd";
                    //If SMTP requires TLS encryption then set it
                    $mail->SMTPSecure = "tls";
                    //Set TCP port to connect to
                    $mail->Port = 587;

                    $mail->From = "aastulibraryproject@gmail.com";
                    $mail->FromName = $sender;

                    $mail->addAddress($email, "Recepient Name");

                    $mail->isHTML(true);

                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    $mail->AltBody = "This is the plain text version of the email content";

                    $mail->send();
                    header("Location: verifyEmail.php");
                } else {
                    $errors['otp_errors'] = 'Failed while sending code!';
                }
            } else {
                $errors['db_errors'] = "Failed while inserting data into database!";
            }
        } else {
            $errors['invalidEmail'] = "Invalid Email Address";
        }
    } else {
        $errors['db_error'] = "Failed while checking email from database!";
    }
}
if (isset($_POST['verifyEmail'])) {
    $_SESSION['message'] = "";
        if ($_SESSION['code'] == $_POST['OTPverify']) {
            header("location: newPassword.php");
        } else {
            $errors['verification_error'] = "Invalid Verification Code";
        }
}

// change Password
if (isset($_POST['changePassword'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirmPassword = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);

    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE user SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            session_unset($email);
            session_unset($_SESSION['code']);
            session_destroy();
            header('location: ../index.php');  
        }
    }
}
