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
    $id = $_POST['id'] ?? '';
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $color = $_POST['color'] ?? '#007bff'; // Default color if not provided

    // Validate inputs
    if (!empty($id) && !empty($title) && !empty($start_date) && !empty($end_date) && !empty($description)) {
        $sql = "UPDATE events SET title = ?, start_date = ?, end_date = ?, description = ?, color = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", $title, $start_date, $end_date, $description, $color, $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Event updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update event. Please try again."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    }
}
?>