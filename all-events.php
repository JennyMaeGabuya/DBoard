<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

$sql = "SELECT id, title, start_date AS start, end_date AS end FROM events";
$result = $con->query($sql);

$events = array();

while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

echo json_encode($events);
?>