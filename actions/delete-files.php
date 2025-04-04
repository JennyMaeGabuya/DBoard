<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "../dbcon.php"; // Include the database connection

if (isset($_GET['id'])) {
    $fileId = intval($_GET['id']);

    // Get file info from the database
    $file_query = "SELECT filename, folder_id FROM files WHERE id = $fileId";
    $file_result = mysqli_query($con, $file_query);
    $file = mysqli_fetch_assoc($file_result);

    if ($file) {
        // Delete the file from the server
        $filePath = "../img/uploads/" . $file['filename'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the file record from the database
        $delete_query = "DELETE FROM files WHERE id = $fileId";
        mysqli_query($con, $delete_query);

        // Redirect back to the folder page with a success message
        header("Location: ../files.php?folder_id=" . $file['folder_id'] . "&message=File deleted successfully.");
        exit();
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>