<?php
// Start session (if needed)
session_start();

// Check if the 'file' query parameter is set
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']);
    $filePath = "../img/uploads/" . $fileName;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Pragma: no-cache');
        header('Expires: 0');

        // Output the file for download
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file.";
}
?>