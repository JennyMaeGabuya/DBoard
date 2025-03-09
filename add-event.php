<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

// Add Events
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    if (!empty($title) && !empty($start_date) && !empty($end_date) && !empty($description)) {
        $sql = "INSERT INTO events (title, start_date, end_date, description) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss", $title, $start_date, $end_date, $description);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Event added successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add event. Please try again."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
    }
}
?>