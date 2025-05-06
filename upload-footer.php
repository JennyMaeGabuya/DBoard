<?php
$uploadDir = 'img/footer/';
$logFile = 'img/footer/footer_log.txt';

// Create folders if not exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
if (!file_exists(dirname($logFile))) {
    mkdir(dirname($logFile), 0755, true);
}

// Check file upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['image']['tmp_name'];
    $originalName = $_FILES['image']['name'];
    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileExt, $allowedExts)) {
        header("Location: settings.php?upload=invalid");
        exit;
    }

    // Generate unique name
    date_default_timezone_set('Asia/Manila');
    $timestamp = date('Ymd_His');
    $newFileName = 'footer_' . $timestamp . '.' . $fileExt;
    $newFilePath = $uploadDir . $newFileName;

    // Move uploaded file
    if (move_uploaded_file($fileTmp, $newFilePath)) {
        // Append to log file
        $logEntry = $newFileName . '|' . date('Y-m-d H:i:s') . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);

        header("Location: settings.php?upload=success");
        exit;
    } else {
        header("Location: settings.php?upload=failed");
        exit;
    }
} else {
    header("Location: settings.php?upload=none");
    exit;
}
?>