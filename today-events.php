<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d");

$query = "SELECT id, title, 
                 DATE_FORMAT(start_date, '%Y-%m-%d %H:%i:%s') AS start_datetime, 
                 DATE_FORMAT(start_date, '%M %e') AS start_date, 
                 DATE_FORMAT(end_date, '%M %e') AS end_date, 
                 TIME_FORMAT(start_date, '%h:%i %p') AS start_time, 
                 color 
          FROM events 
          WHERE DATE(start_date) <= ? AND DATE(end_date) >= ? 
          ORDER BY DATE(start_date) ASC, TIME(start_date) ASC";

$stmt = $con->prepare($query);
$stmt->bind_param("ss", $today, $today);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        "id" => $row["id"],
        "title" => $row["title"],
        "start_datetime" => $row["start_datetime"],
        "start_date" => $row["start_date"],
        "start_time" => $row["start_time"],
        "end_date" => $row["end_date"],
        "color" => $row["color"]
    ];
}

echo json_encode($events);
?>