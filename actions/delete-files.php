<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

include "../dbcon.php";

if (isset($_GET['id'])) {
    $fileId = intval($_GET['id']);

    // Get file info
    $file_query = "SELECT filename, folder_id FROM files WHERE id = $fileId";
    $file_result = mysqli_query($con, $file_query);
    $file = mysqli_fetch_assoc($file_result);

    if ($file) {
        $filePath = "../img/uploads/" . $file['filename'];

        // Delete file from server
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete file record from database
        $delete_query = "DELETE FROM files WHERE id = $fileId";
        if (mysqli_query($con, $delete_query)) {
            echo json_encode(['success' => true, 'message' => 'File deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database delete failed.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'File not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>