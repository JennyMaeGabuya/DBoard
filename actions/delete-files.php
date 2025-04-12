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

if (isset($_GET['id'])) {
    $fileId = intval($_GET['id']);

    // Get file info from DB
    $stmt = mysqli_prepare($con, "SELECT filename, folder_id FROM files WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $fileId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $file = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($file) {
        $originalName = $file['filename'];
        $safeName = sanitizeFileName($originalName);

        $filePath = "../img/uploads/" . $safeName;

        // Delete file from filesystem if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete from database
        $stmt = mysqli_prepare($con, "DELETE FROM files WHERE id = ?");
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