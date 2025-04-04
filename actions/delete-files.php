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

// Get file details from the database
$query = "SELECT filename FROM files WHERE id = $file_id";
$result = mysqli_query($con, $query);
$file = mysqli_fetch_assoc($result);

if (!$file) {
    die("File not found.");
}

$file_path = "img/uploads/" . $file['filename'];

// Delete file from database
$delete_query = "DELETE FROM files WHERE id = $file_id";
if (mysqli_query($con, $delete_query)) {
    // Delete file from server
    if (file_exists($file_path)) {
        unlink($file_path);
    }
    echo "<script>alert('File deleted successfully!'); window.location.href = document.referrer;</script>";
} else {
    echo "<script>alert('Failed to delete file.'); window.location.href = document.referrer;</script>";
}

mysqli_close($con);
?>
