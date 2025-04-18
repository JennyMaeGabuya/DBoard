<?php
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json');

// Define backup directory
$backup_dir = __DIR__ . '/backups';

// Get all SQL backup files
$files = glob($backup_dir . '/*.sql');
$backups = [];

foreach ($files as $file) {
    $filesize = filesize($file);
    $size_text = $filesize < 1024 ? "$filesize B" : 
                 ($filesize < 1048576 ? round($filesize/1024, 2)." KB" : 
                 round($filesize/1048576, 2)." MB");
                 
    $backups[] = [
        'filename' => basename($file),
        'date' => date('Y-m-d H:i:s', filemtime($file)),
        'size' => $size_text
    ];
}

// Sort by date (newest first)
usort($backups, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

echo json_encode($backups);
?>