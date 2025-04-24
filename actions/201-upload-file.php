<?php
include 'dbcon.php';

// Function to sanitize filename
function sanitizeFileName($name) {
    return preg_replace('/[\/\\\\?%*:|"<>#&]/', '_', $name);
}

if (isset($_FILES['files']) && isset($_POST['folder_id'])) {
    $folder_id = intval($_POST['folder_id']);
    $targetDir = "../img/201 Uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFiles = [];
    $errorMessages = [];

    $maxFileSize = 20 * 1024 * 1024; // 20MB in bytes

    $fileCount = count($_FILES['files']['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $originalName = $_FILES['files']['name'][$i];
        $safeName = sanitizeFileName($originalName);
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileError = $_FILES['files']['error'][$i];

        if ($fileError === UPLOAD_ERR_OK) {
            if ($fileSize > $maxFileSize) {
                $errorMessages[] = "File '$originalName' exceeds the 20MB size limit.";
                continue;
            }

            // Check if the same file name already exists under the same folder
            $checkQuery = "SELECT id FROM 201_files WHERE folder_id = ? AND filename = ?";
            $stmt = mysqli_prepare($con, $checkQuery);
            mysqli_stmt_bind_param($stmt, "is", $folder_id, $originalName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $exists = mysqli_stmt_num_rows($stmt) > 0;
            mysqli_stmt_close($stmt);

            if ($exists) {
                $errorMessages[] = "File '$originalName' already exists in this folder.";
                continue;
            }

            $targetPath = $targetDir . $safeName;

            if (move_uploaded_file($fileTmpName, $targetPath)) {
                $insertQuery = "INSERT INTO 201_files (folder_id, filename) VALUES (?, ?)";
                $stmt = mysqli_prepare($con, $insertQuery);
                mysqli_stmt_bind_param($stmt, "is", $folder_id, $originalName);
                if (mysqli_stmt_execute($stmt)) {
                    $uploadedFiles[] = $originalName;
                } else {
                    $errorMessages[] = "Failed to insert '$originalName' into the database.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorMessages[] = "Failed to upload '$originalName'.";
            }
        } else {
            $errorMessages[] = "Error uploading '$originalName'. Error code: $fileError.";
        }
    }

    echo json_encode([
        'success' => count($uploadedFiles) > 0,
        'message' => count($uploadedFiles) > 0 ? 'Files uploaded successfully.' : 'No files uploaded.',
        'uploaded' => $uploadedFiles,
        'errors' => $errorMessages
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'No files uploaded or folder ID missing.']);
}
?>
