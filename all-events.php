<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

$sql = "SELECT title, start_date, end_date FROM events";
$result = $con->query($sql);

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'title' => $row['title'],
        'start' => $row['start_date'],
        'end'   => $row['end_date']
    ];
}

// Output as JSON
header('Content-Type: application/json');
echo json_encode($events);
?>