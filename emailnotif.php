<?php

include "dbcon.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

date_default_timezone_set('Asia/Manila'); 


// Get current time and future time (15 minutes later)
function sendEmailReminder($title, $start_datetime, $description, $color) {
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
      $mail->addAddress('erinayeeyangam@gmail.com', 'hey');

      $mail->Subject = "Event Reminder";
      $mail->isHTML(true);
      $mail->Body = "
          <div style='font-family: Arial, sans-serif; color: #333;'>
              <h2 style='color: $color;'>📅 Event Reminder</h2>
              <p><strong>Dear Gally D. Tipan,</strong></p>
              <p>This is a friendly reminder that your scheduled event is happening soon. Get ready!</p>
              <p>Your event <strong>'$title'</strong> is starting soon!</p>
              <p><strong>📆 Date & Time:</strong> " . date('F d, Y h:i A', strtotime($start_datetime)) . "</p>
              <p><strong>📝</strong> $description</p>
          </div>
      ";

      $mail->send();
  } catch (Exception $e) {
      error_log("Mail Error: " . $mail->ErrorInfo);
  }
}

// Get current time and 15 minutes later
$current_time = date("Y-m-d H:i:s");
$future_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));

$sql = "SELECT id, title, description, 
             DATE_FORMAT(start_date, '%Y-%m-%d %H:%i:%s') AS start_datetime, 
             DATE_FORMAT(start_date, '%M %e') AS start_date, 
             DATE_FORMAT(end_date, '%M %e') AS end_date, 
             TIME_FORMAT(start_date, '%h:%i %p') AS start_time, 
             color 
      FROM events 
      WHERE start_date BETWEEN ? AND ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $current_time, $future_time);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  sendEmailReminder($row['title'], $row['start_datetime'], $row['description'], $row['color']);
}

$stmt->close();
$con->close();
//email


?>