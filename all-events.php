<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";
include 'emailnotif.php';

$query = "SELECT id, title, start_date AS start, end_date AS end, description, color FROM events";
$result = $con->query($query);

$events = [];
while ($row = $result->fetch_assoc()) {
    $start = date("Y-m-d ", strtotime($row["start"])) . " | " . date("h:i A", strtotime($row["start"])); // Format date and time with space before time
    $end = date("Y-m-d ", strtotime($row["end"])) . " | " . date("h:i A", strtotime($row["end"])); // Format date and time with space before time


    $events[] = [
        "id" => $row["id"],
        "title" => $row["title"],
        "start" => $row["start"],
        "end" => $row["end"],
        "description" => $row["description"],
        "color" => $row["color"]
    ];
}

echo json_encode($events);
?>