<?php
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json');

// Define backup directory
$backup_dir = __DIR__ . '/backups';

// Function to get the most recent backup file
function getLastBackupInfo($directory) {
    $files = glob($directory . '/*.sql');
    
    if (empty($files)) {
        return null;
    }
    
    // Sort files by modification time (newest first)
    usort($files, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });
    
    $newestFile = $files[0];
    return [
        'filename' => basename($newestFile),
        'timestamp' => filemtime($newestFile)
    ];
}

// Get last backup info
$lastBackup = getLastBackupInfo($backup_dir);

// Calculate days since last backup
if ($lastBackup) {
    $now = time();
    $daysSinceLastBackup = floor(($now - $lastBackup['timestamp']) / (60 * 60 * 24));
    $needsBackup = $daysSinceLastBackup >= 7; // Backup needed if more than 7 days
} else {
    // No previous backup found, so we need one
    $daysSinceLastBackup = null;
    $needsBackup = true;
}

echo json_encode([
    'lastBackup' => $lastBackup ? $lastBackup['filename'] : null,
    'lastBackupTime' => $lastBackup ? date('Y-m-d H:i:s', $lastBackup['timestamp']) : null,
    'daysSinceLastBackup' => $daysSinceLastBackup,
    'needsBackup' => $needsBackup
]);
?>