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
        die("Invalid file type. Allowed: JPG, JPEG, PNG, GIF.");
    }

    // Generate unique name
    $timestamp = date('Ymd_His');
    $newFileName = 'footer_' . $timestamp . '.' . $fileExt;
    $newFilePath = $uploadDir . $newFileName;

    // Move uploaded file
    if (move_uploaded_file($fileTmp, $newFilePath)) {
        // Append to log file
        $logEntry = $newFileName . '|' . date('Y-m-d H:i:s') . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);

        echo "<script>alert('Footer uploaded successfully.'); window.location.href='settings.php';</script>";
    } else {
        die("Upload failed.");
    }
} else {
    die("No image uploaded.");
}
?>
