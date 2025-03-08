<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}

// Get certificate ID and type
$id = $_POST['id'] ?? null;
$type = $_POST['type'] ?? null;

if (!$id || !$type) {
    echo json_encode(["status" => "error", "message" => "Certificate ID and type are required."]);
    exit();
}

// Determine the correct table based on certificate type
if ($type === "appointed") {
    $table = "appointed_cert_issuance";
} elseif ($type === "elected") {
    $table = "elected_cert_issuance";
} else {
    echo json_encode(["status" => "error", "message" => "Invalid certificate type."]);
    exit();
}

// Check if the record exists before deleting
$checkQuery = $con->prepare("SELECT id FROM $table WHERE id = ?");
$checkQuery->bind_param("i", $id);
$checkQuery->execute();
$checkResult = $checkQuery->get_result();

if ($checkResult->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Certificate not found."]);
    exit();
}

// Delete the record
$deleteQuery = $con->prepare("DELETE FROM $table WHERE id = ?");
$deleteQuery->bind_param("i", $id);

if ($deleteQuery->execute()) {
    echo json_encode(["status" => "success", "message" => "Certificate deleted successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to delete certificate: " . $deleteQuery->error]);
}

// Close connections
$checkQuery->close();
$deleteQuery->close();
$con->close();
?>