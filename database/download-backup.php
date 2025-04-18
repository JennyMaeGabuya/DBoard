<?php
date_default_timezone_set('Asia/Manila');

// Basic security check
if (!isset($_GET['file']) || empty($_GET['file'])) {
    die("No file specified");
}

// Sanitize the filename to prevent directory traversal attacks
$filename = basename($_GET['file']);

// Define the backup directory path
$backup_dir = __DIR__ . '/backups';
$file_path = $backup_dir . '/' . $filename;

// Check if the file exists and is a SQL file
if (!file_exists($file_path) || !is_file($file_path) || pathinfo($file_path, PATHINFO_EXTENSION) !== 'sql') {
    die("Invalid file requested");
}

// Set headers to force download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

// Output file
readfile($file_path);
exit;
?>