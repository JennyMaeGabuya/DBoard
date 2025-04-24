<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderName = trim($_POST['folder_name']);
    $parentId = isset($_POST['parent_id']) && $_POST['parent_id'] !== '' ? intval($_POST['parent_id']) : null;

    if ($folderName === '') {
        echo json_encode(['success' => false, 'message' => 'Folder name cannot be empty.']);
        exit;
    }

    // Define base path
    $basePath = "../img/201 Files/";
    $fullPath = $basePath;

    if ($parentId !== null) {
        // Reconstruct folder path from DB hierarchy
        $pathSegments = [];
        $currentId = $parentId;

        while ($currentId !== null) {
            $stmt = $con->prepare("SELECT name, parent_id FROM 201_folders WHERE id = ?");
            $stmt->bind_param("i", $currentId);
            $stmt->execute();
            $stmt->bind_result($name, $nextParentId);

            if ($stmt->fetch()) {
                array_unshift($pathSegments, $name);
                $currentId = $nextParentId;
            } else {
                echo json_encode(['success' => false, 'message' => 'Parent folder not found.']);
                exit;
            }

            $stmt->close();
        }

        $fullPath .= '/' . implode('/', $pathSegments);
    }

    $newFolderPath = $fullPath . '/' . $folderName;

    // Debug path creation
    error_log("Creating subfolder at: " . $newFolderPath);

    if (!file_exists($newFolderPath)) {
        if (mkdir($newFolderPath, 0777, true)) {
            // Insert in DB
            $stmt = $con->prepare("INSERT INTO 201_folders (name, parent_id) VALUES (?, ?)");
            $stmt->bind_param("si", $folderName, $parentId);
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Subfolder created successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert into DB.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to create folder on server.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Folder already exists.']);
    }
}
?>