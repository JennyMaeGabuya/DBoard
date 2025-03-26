<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If installed via Composer
// Or require the necessary PHPMailer files manually
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';
// require 'path/to/PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Change if using a different mail service
    $mail->SMTPAuth = true;
    $mail->Username = 'strojincskubisy7535cheek@gmail.com';
    $mail->Password = 'ekspfwohaxfgdluu'; // Use App Password if using Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email settings
    $mail->setFrom('strojincskubisy7535cheek@gmail.com', 'Your Name');
    $mail->addAddress('jennymaegabuya8@gmail.com', 'Recipient Name');
    $mail->Subject = 'Test Email from WAMP & PHPMailer';
    $mail->Body = 'This is a test email sent from PHPMailer on WAMP!';
    
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>