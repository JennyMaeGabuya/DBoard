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
        $message = "<p>Click the link below to reset your password:</p>
                    <p><a href='$resetLink'>Reset Your Password</a></p>
                    <p>This link will expire in 15 minutes.</p>";

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