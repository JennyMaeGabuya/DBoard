<?php

include "dbcon.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

date_default_timezone_set('Asia/Manila');

// Get current time and future time (15 minutes later)
function sendEmailReminder($title, $start_datetime, $description, $color)
{
  $mail = new PHPMailer(true);
  try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'strojincskubisy7535cheek@gmail.com';
    $mail->Password = 'ekspfwohaxfgdluu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email Setup
    $mail->setFrom('strojincskubisy7535cheek@gmail.com', 'Event Reminder');
    $mail->addAddress('erinayeeyangam@gmail.com');

    $mail->Subject = "Event Reminder - $title";
    $mail->isHTML(true);

    // Default to blue if no color is provided
    $eventColor = $color ?: "#007bff";

    $mail->Body = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
                text-align: center;
            }
            .email-container {
                max-width: 500px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border: 2px solid #007bff;
            }
            h2 {
                color: $eventColor;
                margin-bottom: 10px;
                text-align: center;
            }
            hr {
                border: 1px solid #ddd;
            }
            .greeting, .message {
                font-size: 16px;
                color: #555;
            }
            .event-box {
                background: #f9f9f9;
                padding: 15px;
                border-radius: 8px;
                margin: 15px 0;
            }
            .event-box h3 {
                color: $eventColor;
            }
            .event-box p {
                font-size: 15px;
                color: black;
            }
            .footer {
                color: #888;
                font-size: 12px;
                font-style: italic;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <h2>📅 Event Reminder</h2>
            <hr>
            
            <p class='greeting'><strong>Dear Gally D. Tipan,</strong></p>
            <p class='message'>This is a friendly reminder that your scheduled event is happening soon. Get ready!</p>
            
            <div class='event-box'>
                <h3>$title</h3>
                <p><strong>Date & Time:</strong> " . date('F d, Y h:i A', strtotime($start_datetime)) . "</p>
                <p><strong>Details:</strong> $description</p>
            </div>
            
            <p class='message'>Don't forget to mark your calendar. We hope you have a great event! 🎉</p>
    
            <hr>
            <p class='footer'>This is an automated email. Please do not reply.</p>
        </div>
    </body>
    </html>
  ";

    $mail->send();

    return true;
  } catch (Exception $e) {
    error_log("Mail Error: " . $mail->ErrorInfo);
    return false;
  }
}

// Get current time and 15 minutes later
$current_time = date("Y-m-d H:i:s");
$future_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));

// Select only events that haven't had an email sent yet
$sql = "SELECT id, title, description, 
             DATE_FORMAT(start_date, '%Y-%m-%d %H:%i:%s') AS start_datetime, 
             DATE_FORMAT(start_date, '%M %e') AS start_date, 
             DATE_FORMAT(end_date, '%M %e') AS end_date, 
             TIME_FORMAT(start_date, '%h:%i %p') AS start_time, 
             color, sent_mail 
      FROM events 
      WHERE start_date BETWEEN ? AND ? 
      AND sent_mail = 0";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $current_time, $future_time);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  if (sendEmailReminder($row['title'], $row['start_datetime'], $row['description'], $row['color'])) {

    $update_sql = "UPDATE events SET sent_mail = 1 WHERE id = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("i", $row['id']);
    $update_stmt->execute();
    $update_stmt->close();
  }
}

$stmt->close();
?>