<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

include "dbcon.php";

// Sanitize filename to match how it's stored on the filesystem
function sanitizeFileName($name) {
    return preg_replace('/[\/\\\\?%*:|"<>#&]/', '_', $name);
}

// Reconstruct folder path from folder_id
function getFolderPath($folder_id, $con) {
    $pathSegments = [];
    $currentId = $folder_id;

    while ($currentId !== null) {
        $stmt = $con->prepare("SELECT name, parent_id FROM leave_folders WHERE id = ?");
        $stmt->bind_param("i", $currentId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $name = '';
            $parentId = null;
            $stmt->bind_result($name, $parentId);
            $stmt->fetch();

            array_unshift($pathSegments, sanitizeFileName($name));
            $currentId = $parentId;
        } else {
            $stmt->close();
            return false;
        }

        $stmt->close();
    }

    return implode('/', $pathSegments);
}

if (isset($_GET['id'])) {
    $fileId = intval($_GET['id']);

    // Get file info from DB
    $stmt = mysqli_prepare($con, "SELECT filename, folder_id FROM leave_files WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $fileId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $file = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($file) {
        $originalName = $file['filename'];
        $safeName = sanitizeFileName($originalName);

        $relativePath = getFolderPath($file['folder_id'], $con);
        if ($relativePath === false) {
            echo json_encode(['success' => false, 'message' => 'Failed to resolve folder path.']);
            exit();
        }

        $filePath = "../img/Leave Files/" . $relativePath . "/" . $safeName;

        // Delete file from filesystem if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete from database
        $stmt = mysqli_prepare($con, "DELETE FROM leave_files WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $fileId);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true, 'message' => 'File deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database delete failed.']);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'File not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?> 