<?php
session_start();
include "dbcon.php";

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

if (!isset($_GET['id'])) {
    die("Invalid file ID.");
}

$file_id = intval($_GET['id']);

// Get file info including folder_id
$query = "SELECT filename, folder_id FROM leave_files WHERE id = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $file_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $filename, $folder_id);
if (!mysqli_stmt_fetch($stmt)) {
    die("File not found.");
}
mysqli_stmt_close($stmt);

// Reconstruct full folder path
$baseDir = "../img/Leave Files/";
$pathSegments = [];
$currentId = $folder_id;

while ($currentId !== null) {
    $stmt = $con->prepare("SELECT name, parent_id FROM leave_folders WHERE id = ?");
    $stmt->bind_param("i", $currentId);
    $stmt->execute();
    $stmt->bind_result($name, $parentId);
    
    if ($stmt->fetch()) {
        array_unshift($pathSegments, preg_replace('/[\/\\\\?%*:|"<>#&]/', '_', $name)); // Sanitize folder name
        $currentId = $parentId;
    } else {
        die("Folder path not found.");
    }

    $stmt->close();
}

$file_path = $baseDir . implode('/', $pathSegments) . '/' . $filename;

if (!file_exists($file_path)) {
    die("File does not exist.");
}

$mime_type = mime_content_type($file_path);

// Only allow preview for supported file types
$previewable_types = [
    'image/jpeg', 
    'image/png', 
    'image/gif', 
    'application/pdf', 
    'application/msword', 
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
];

if (in_array($mime_type, $previewable_types)) {
    header("Content-Type: $mime_type");
    header("Content-Disposition: inline; filename=\"" . basename($file_path) . "\"");
    header("Content-Transfer-Encoding: binary");
    header("Accept-Ranges: bytes");
    @readfile($file_path);
    exit;
} else {
    echo "This file cannot be previewed.";
    exit;
}
?>