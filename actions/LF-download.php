<?php
session_start();
include "../dbcon.php";

if (isset($_GET['file_id']) && is_numeric($_GET['file_id'])) {
    $file_id = intval($_GET['file_id']);

    $stmt = $con->prepare("SELECT filename, folder_id FROM leave_files WHERE id = ?");
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($file = $result->fetch_assoc()) {
        $filename = $file['filename'];
        $folder_id = $file['folder_id'];

        $filePath = getFullFolderPath($folder_id, $con) . '/' . $filename;

        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            header('Pragma: no-cache');
            header('Expires: 0');
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid request.";
}

function getFullFolderPath($folder_id, $con)
{
    $parts = [];

    while ($folder_id !== null) {
        $res = mysqli_query($con, "SELECT name, parent_id FROM leave_folders WHERE id = $folder_id");
        if ($res && $row = mysqli_fetch_assoc($res)) {
            array_unshift($parts, $row['name']);
            $folder_id = $row['parent_id'];
        } else {
            break;
        }
    }

    return '../img/Leave Files/' . implode('/', $parts);
}
?>