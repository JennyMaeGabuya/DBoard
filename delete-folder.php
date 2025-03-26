<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['folder_ids'])) {
    $folderIds = $_POST['folder_ids'];
    $placeholders = implode(',', array_fill(0, count($folderIds), '?'));

    // Prepare SQL to fetch folder names before deletion
    $stmtFetch = $con->prepare("SELECT name FROM folders WHERE id IN ($placeholders)");
    $stmtFetch->bind_param(str_repeat('i', count($folderIds)), ...$folderIds);
    $stmtFetch->execute();
    $result = $stmtFetch->get_result();

    $foldersToDelete = [];
    while ($row = $result->fetch_assoc()) {
        $foldersToDelete[] = $row['name'];
    }
    $stmtFetch->close();

    // Delete folders from database
    $stmtDelete = $con->prepare("DELETE FROM folders WHERE id IN ($placeholders)");
    $stmtDelete->bind_param(str_repeat('i', count($folderIds)), ...$folderIds);

    if ($stmtDelete->execute()) {
        // Delete the corresponding folders and files from the system
        foreach ($foldersToDelete as $folderName) {
            $folderPath = "../Dboard/img/CSC Files/" . $folderName;
            if (is_dir($folderPath)) {
                deleteFolder($folderPath);
            }
        }

        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmtDelete->error]);
    }

    $stmtDelete->close();
    $con->close();
}

// Function to delete a folder and its contents
function deleteFolder($folderPath)
{
    if (!is_dir($folderPath)) {
        return;
    }

    $files = array_diff(scandir($folderPath), ['.', '..']);
    foreach ($files as $file) {
        $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
        if (is_dir($filePath)) {
            deleteFolder($filePath);
        } else {
            unlink($filePath);
        }
    }
    rmdir($folderPath);
}
?>