<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";

$id = $_POST['id'] ?? null;
$type = $_POST['type'] ?? null;

if (!$id || !$type) {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit();
}

$table = ($type === "appointed") ? "appointed_cert_issuance" : "elected_cert_issuance";

$query = $con->prepare("SELECT * FROM $table WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result()->fetch_assoc();

if ($result) {
    echo json_encode(["status" => "success", "data" => $result]);
} else {
    echo json_encode(["status" => "error", "message" => "Certificate not found"]);
}
?>
