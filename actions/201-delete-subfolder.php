<?php
include '../dbcon.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $subfolder_id = intval($_GET['id']);

    // Recursively build full folder path
    function getFullFolderPath($folder_id, $con)
    {
        $parts = [];

        while ($folder_id !== null) {
            $res = mysqli_query($con, "SELECT name, parent_id FROM 201_folders WHERE id = $folder_id");
            if ($res && $row = mysqli_fetch_assoc($res)) {
                array_unshift($parts, $row['name']); // prepend folder name
                $folder_id = $row['parent_id'];
            } else {
                break;
            }
        }

        return '../img/201 Files/' . implode('/', $parts);
    }

    // Recursively delete all folders, subfolders, and files
    function deleteFolderAndContents($folder_id, $con)
    {
        // Delete subfolders first
        $subfolders_result = mysqli_query($con, "SELECT id FROM 201_folders WHERE parent_id = $folder_id");
        while ($sub = mysqli_fetch_assoc($subfolders_result)) {
            deleteFolderAndContents($sub['id'], $con);
        }

        // Delete files in folder (from directory and DB)
        $file_result = mysqli_query($con, "SELECT filename FROM 201_files WHERE folder_id = $folder_id");
        while ($row = mysqli_fetch_assoc($file_result)) {
            $file_path = '../img/uploads/' . $row['filename'];
            if (file_exists($file_path)) {
                unlink($file_path); // Delete the file
            }
        }
        mysqli_query($con, "DELETE FROM 201_files WHERE folder_id = $folder_id");

        // Delete the folder from the filesystem
        $folder_path = getFullFolderPath($folder_id, $con);
        if (is_dir($folder_path)) {
            deleteDirectory($folder_path);
        }

        // Finally, delete the folder from the DB
        mysqli_query($con, "DELETE FROM 201_folders WHERE id = $folder_id");
    }

    // Helper: recursive directory deletion
    function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir); // Return true after deleting the file
        }

        foreach (scandir($dir) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            is_dir($path) ? deleteDirectory($path) : unlink($path);
        }

        return rmdir($dir); // Delete the folder itself
    }

    // Run the deletion
    deleteFolderAndContents($subfolder_id, $con);

    // Redirect back
    $referer = $_SERVER['HTTP_REFERER'] ?? '201-files.php';
    header("Location: $referer");
    exit;
} else {
    echo "Invalid request.";
}
?>