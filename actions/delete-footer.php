<?php
header('Content-Type: application/json');

$folder = '../img/footer/';
$logFile = '../img/footer_log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filename'])) {
    $filename = basename($_POST['filename']);
    $filePath = $folder . $filename;

    if (file_exists($filePath)) {
        unlink($filePath);

        // Clean log
        if (file_exists($logFile)) {
            $lines = file($logFile);
            $filtered = array_filter($lines, function($line) use ($filename) {
                return strpos($line, $filename) === false;
            });
            file_put_contents($logFile, implode("", $filtered));
        }

        echo json_encode(['status' => 'success', 'message' => 'Footer deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File not found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>