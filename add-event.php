<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $color = $_POST['color'] ?? '#007bff'; // Default color if not provided

    // Check if all fields are filled
    if (!empty($title) && !empty($start_date) && !empty($end_date) && !empty($description)) {
        $sql = "INSERT INTO events (title, start_date, end_date, description, color) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssss", $title, $start_date, $end_date, $description, $color);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Event added successfully.", "id" => $con->insert_id]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add event. Please try again."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
    }
}
?>