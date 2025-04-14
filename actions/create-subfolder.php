<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderName = trim($_POST['folder_name']);
    $parentId = isset($_POST['parent_id']) && $_POST['parent_id'] !== '' ? intval($_POST['parent_id']) : null;

    if ($folderName === '') {
        echo json_encode(['success' => false, 'message' => 'Folder name cannot be empty.']);
        exit;
    }

    $stmt = $con->prepare("INSERT INTO folders (name, parent_id) VALUES (?, ?)");
    $stmt->bind_param("si", $folderName, $parentId);
    $success = $stmt->execute();

    if ($success) {
        echo json_encode(['success' => true, 'message' => 'Folder created successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to create folder.']);
    }
}
?>
