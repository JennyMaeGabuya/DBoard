<?php

header('Content-Type: application/json');

// For security, add proper validation and authentication
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
    exit;
}

if (!isset($_POST['filename']) || empty($_POST['filename'])) {
    echo json_encode(['status' => 'error', 'message' => 'No filename provided']);
    exit;
}

$filename = $_POST['filename'];
$footerDir = "../img/footer/";

// Validate that the file exists
if (!file_exists($footerDir . $filename)) {
    echo json_encode(['status' => 'error', 'message' => 'File does not exist']);
    exit;
}

// Validate file extension for additional security
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
if (!in_array($file_extension, $allowed_extensions)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid file type']);
    exit;
}

try {
    // Update the current footer (latest-footer.jpg)
    $newFooterPath = $footerDir . $filename;
    $currentFooterPath = $footerDir . 'latest-footer.jpg';

    // Copy the selected footer to latest-footer.jpg
    if (copy($newFooterPath, $currentFooterPath)) {
        // If successful, log the change
        $footerLogFile = '../img/footer/footer_log.txt';
        $timestamp = date('Y-m-d H:i:s');
        $userId = $_SESSION['user_id'];

        // Format the log entry
        $logEntry = "$filename|$timestamp|User ID: $userId\n";

        // Append to the log file
        if (file_put_contents($footerLogFile, $logEntry, FILE_APPEND) !== false) {
            echo json_encode(['status' => 'success', 'message' => 'Footer updated successfully']);
        } else {
            throw new Exception("Could not write to footer_log.txt");
        }
    } else {
        throw new Exception("Failed to copy the selected footer to latest-footer.jpg");
    }
} catch (Exception $e) {
    error_log('Footer update error: ' . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Error updating footer: ' . $e->getMessage()]);
}
?>