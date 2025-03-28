<?php
session_start();
require 'dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check if the email exists in the admin table
    $stmt = $con->prepare("SELECT employee_no FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50));
        date_default_timezone_set('Asia/Manila');
        $expires_at = date("Y-m-d H:i:s", time() + (15 * 60));

        // Store token and expiration in the database
        $stmt = $con->prepare("UPDATE admin SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires_at, $email);
        $stmt->execute();

        // Generate password reset link
        $resetLink = "http://localhost/DBoard/reset-password.php?token=$token";

        // Email details
        $subject = "Password Reset Request";

        // HTML Email Template
        $message = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    padding: 20px;
                }
                .container {
                    max-width: 500px;
                    background: white;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }
                h2 {
                    color: #333;
                }
                p {
                    font-size: 16px;
                    color: #555;
                }
                .button {
                    display: inline-block;
                    padding: 12px 20px;
                    font-size: 16px;
                    color: #fff !important;
                    background-color: #ff9800;
                    text-decoration: none;
                    border-radius: 5px;
                    margin-top: 10px;
                    font-weight: bold;
                }
                .button:hover {
                    background-color: #e68900;
                }
                .footer {
                    margin-top: 20px;
                    font-size: 13px;
                    color: red;
                    font-style: italic;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Password Reset Request</h2>
                <p>We received a request to reset your password. Click the button below to proceed:</p>
                <a class='button' href='$resetLink'>Reset Your Password</a>
                <p>If you did not request this, please ignore this email.</p>
                <p class='footer'>This link will expire in <u>15 minutes</u>.</p>
            </div>
        </body>
        </html>
        ";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'strojincskubisy7535cheek@gmail.com';
            $mail->Password = 'ekspfwohaxfgdluu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('strojincskubisy7535cheek@gmail.com', 'M.Kahoy LGU | ERMS');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            $_SESSION['success'] = "A password reset link has been sent to your email.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Failed to send email. Please try again later.";
        }
    } else {
        $_SESSION['error'] = "No account found with that email.";
    }

    header("Location: index.php");
    exit();
}
?>