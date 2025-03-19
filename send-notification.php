<?php
include "dbcon.php";

date_default_timezone_set('Asia/Manila');
$current_time = date("H:i");
$current_date = date("Y-m-d");

// Get events happening in the next 15 minutes
$query = "SELECT title, TIME_FORMAT(start_date, '%h:%i %p') AS start_time FROM events 
          WHERE TIMESTAMPDIFF(MINUTE, NOW(), start_date) BETWEEN 14 AND 16";
          
$result = $con->query($query);

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        "title" => $row["title"],
        "body" => "Your event '{$row["title"]}' starts in 15 minutes!"
    ];
}

echo json_encode($events);
?>