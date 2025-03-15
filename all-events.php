<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

$query = "SELECT id, title, start_date AS start, end_date AS end, description, color FROM events";
$result = $con->query($query);

$events = [];
while ($row = $result->fetch_assoc()) {
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