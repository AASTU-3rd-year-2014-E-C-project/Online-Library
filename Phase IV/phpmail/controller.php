<?php
include_once("../inc/conn.php");
// Connection Created Successfully

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;


require_once 'vendor/autoload.php';

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
                $message = "<h3>Your verification code is <strong>$code</strong></h3>";
                $sender = 'From: AASTU Digital Library';

                if (1) {

                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;

                    //Set the encryption mechanism to use:
                    // - SMTPS (implicit TLS on port 465) or
                    // - STARTTLS (explicit TLS on port 587)
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                    $mail->SMTPAuth = true;
                    $mail->AuthType = 'XOAUTH2';

                    $email = 'aastulibraryproject@gmail.com'; // the email used to register google app
                    $clientId = '46045524555-vn630te1l9ik5snnvakecmt6s447rvkf.apps.googleusercontent.com';
                    $clientSecret = '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';
                    $refreshToken = '1//03wX6wUllkIZNCgYIARAAGAMSNwF-L9IroXCr3SyqSaZOnk12Dtq8X0acVyxKuN1z3QgeGWXLfA2tgCGY09IeNdbHLYyimEaNteU';

                    //Create a new OAuth2 provider instance
                    $provider = new Google(
                        [
                            'clientId' => $clientId,
                            'clientSecret' => $clientSecret,
                        ]
                    );

                    //Pass the OAuth provider instance to PHPMailer
                    $mail->setOAuth(
                        new OAuth(
                            [
                                'provider' => $provider,
                                'clientId' => $clientId,
                                'clientSecret' => $clientSecret,
                                'refreshToken' => $refreshToken,
                                'userName' => $email,
                            ]
                        )
                    );

                    $mail->setFrom($email, $sender);
                    $mail->addAddress('nhabtamu42@gmail.com', 'AASTU Digital Library User');
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;

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
