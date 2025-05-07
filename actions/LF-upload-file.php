<?php
include 'dbcon.php';

// Function to sanitize filename
function sanitizeFileName($name)
{
    return preg_replace('/[\/\\\\?%*:|"<>#&]/', '_', $name);
}

if (isset($_FILES['files']) && isset($_POST['folder_id'])) {
    $folder_id = intval($_POST['folder_id']);

    // Get the folder name from the database
    $folderQuery = "SELECT name FROM leave_folders WHERE id = ?";
    $stmt = mysqli_prepare($con, $folderQuery);
    mysqli_stmt_bind_param($stmt, "i", $folder_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $folderName);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (!$folderName) {
        echo json_encode(['success' => false, 'message' => 'Invalid folder ID.']);
        exit;
    }

    $safeFolderName = sanitizeFileName($folderName);
    // Reconstruct full folder path based on folder_id
    $baseDir = "../img/Leave Files/";
    $pathSegments = [];
    $currentId = $folder_id;

    while ($currentId !== null) {
        $stmt = $con->prepare("SELECT name, parent_id FROM leave_folders WHERE id = ?");
        $stmt->bind_param("i", $currentId);
        $stmt->execute();
        $stmt->bind_result($name, $parentId);

        if ($stmt->fetch()) {
            array_unshift($pathSegments, sanitizeFileName($name)); // Sanitize folder names too
            $currentId = $parentId;
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid folder ID.']);
            exit;
        }

        $stmt->close();
    }

    $targetDir = $baseDir . implode('/', $pathSegments) . '/';

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFiles = [];
    $errorMessages = [];

    $maxFileSize = 150 * 1024 * 1024; // 150MB

    $fileCount = count($_FILES['files']['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $originalName = $_FILES['files']['name'][$i];
        $safeName = sanitizeFileName($originalName);
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileError = $_FILES['files']['error'][$i];

        if ($fileError === UPLOAD_ERR_OK) {
            if ($fileSize > $maxFileSize) {
                $errorMessages[] = "File '$originalName' exceeds the 150MB size limit.";
                continue;
            }

            // Check for duplicate file in same folder
            $checkQuery = "SELECT id FROM leave_files WHERE folder_id = ? AND filename = ?";
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
                $insertQuery = "INSERT INTO leave_files (folder_id, filename) VALUES (?, ?)";
                $stmt = mysqli_prepare($con, $insertQuery);
                mysqli_stmt_bind_param($stmt, "is", $folder_id, $originalName);
                if (mysqli_stmt_execute($stmt)) {
                    $uploadedFiles[] = $originalName;
                } else {
                    $errorMessages[] = "Database insert failed for '$originalName'.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorMessages[] = "Failed to move uploaded file '$originalName'.";
            }
        } else {
            $errorMessages[] = "Upload error for '$originalName'. Code: $fileError.";
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
