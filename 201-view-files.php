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

$query = "SELECT filename FROM 201_files WHERE id = $file_id";
$result = mysqli_query($con, $query);
$file = mysqli_fetch_assoc($result);

if (!$file) {
    die("File not found.");
}

$file_path = "img/uploads/201 Files" . $file['filename'];

if (!file_exists($file_path)) {
    die("File does not exist.");
}

$mime_type = mime_content_type($file_path);

// Only allow preview for supported file types (e.g., image, PDF, Word)
$previewable_types = [
    'image/jpeg', 
    'image/png', 
    'image/gif', 
    'application/pdf', 
    'application/msword', 
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
];

if (in_array($mime_type, $previewable_types)) {
    // Set headers for inline display, ensuring the file is previewed in the browser
    header("Content-Type: $mime_type");
    header("Content-Disposition: inline; filename=\"" . basename($file_path) . "\"");

    // For PDF/image/office file preview support
    header("Content-Transfer-Encoding: binary");
    header("Accept-Ranges: bytes");

    // Output the file content for preview
    @readfile($file_path);
    exit;
} else {
    // If the file type is not previewable, show an error message or redirect to a download
    echo "This file cannot be previewed.";
    exit;
}
?>