<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['folder_ids'])) {
    $folderIds = $_POST['folder_ids'];
    $placeholders = implode(',', array_fill(0, count($folderIds), '?'));

    // Fetch folders to delete (id and name)
    $stmtFetch = $con->prepare("SELECT id, name FROM leave_folders WHERE id IN ($placeholders)");
    $stmtFetch->bind_param(str_repeat('i', count($folderIds)), ...$folderIds);
    $stmtFetch->execute();
    $result = $stmtFetch->get_result();

    $foldersToDelete = [];
    while ($row = $result->fetch_assoc()) {
        $foldersToDelete[] = $row;
    }
    $stmtFetch->close();

    // Prepare statements once
    $stmtDeleteFiles = $con->prepare("DELETE FROM leave_files WHERE folder_id = ?");
    $stmtDeleteFolder = $con->prepare("DELETE FROM leave_folders WHERE id = ?");

    foreach ($foldersToDelete as $folder) {
        $folderId = $folder['id'];

        // Recursively delete subfolders (and their files and DB records)
        deleteSubfolders($folderId, $con, $stmtDeleteFiles, $stmtDeleteFolder);

        // Delete files inside the parent folder
        $stmtDeleteFiles->bind_param('i', $folderId);
        $stmtDeleteFiles->execute();

        // Delete parent folder itself from DB
        $stmtDeleteFolder->bind_param('i', $folderId);
        $stmtDeleteFolder->execute();

        // Delete folder from file system
        $folderPath = "../img/Leave Files/" . $folder['name'];
        if (is_dir($folderPath)) {
            deleteFolder($folderPath);
        }
    }

    echo json_encode(["success" => true]);

    $stmtDeleteFiles->close();
    $stmtDeleteFolder->close();
    $con->close();
}

// Recursively delete subfolders and their DB entries
function deleteSubfolders($parentFolderId, $con, $stmtDeleteFiles, $stmtDeleteFolder)
{
    $stmt = $con->prepare("SELECT id FROM leave_folders WHERE parent_id = ?");
    $stmt->bind_param('i', $parentFolderId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $subfolderId = $row['id'];

        // Recursively delete deeper levels first
        deleteSubfolders($subfolderId, $con, $stmtDeleteFiles, $stmtDeleteFolder);

        // Delete files in subfolder
        $stmtDeleteFiles->bind_param('i', $subfolderId);
        $stmtDeleteFiles->execute();

        // Delete subfolder itself from DB
        $stmtDeleteFolder->bind_param('i', $subfolderId);
        $stmtDeleteFolder->execute();
    }

    $stmt->close();
}

// Recursively delete folder from filesystem
function deleteFolder($folderPath)
{
    if (!is_dir($folderPath)) return;

    $items = array_diff(scandir($folderPath), ['.', '..']);
    foreach ($items as $item) {
        $itemPath = $folderPath . DIRECTORY_SEPARATOR . $item;
        is_dir($itemPath) ? deleteFolder($itemPath) : unlink($itemPath);
    }
    rmdir($folderPath);
}
?>