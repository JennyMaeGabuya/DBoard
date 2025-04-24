<?php
header('Content-Type: application/json');
include 'dbcon.php'; // Ensure this file contains the correct database connection

if (!isset($_POST['id'], $_POST['name'])) {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
    exit;
}

$folder_id = intval($_POST['id']);
$folder_name = mysqli_real_escape_string($con, $_POST['name']);

// Check if the folder name already exists
$checkQuery = "SELECT COUNT(*) as count FROM 201_folders WHERE name = '$folder_name' AND id != $folder_id";
$checkResult = mysqli_query($con, $checkQuery);
$row = mysqli_fetch_assoc($checkResult);

if ($row['count'] > 0) {
    echo json_encode(['success' => false, 'error' => 'Folder name already exists']);
    exit;
}

// Get the current folder name and parent folder ID from the database
$currentFolderQuery = "SELECT name, parent_id FROM 201_folders WHERE id = $folder_id";
$currentFolderResult = mysqli_query($con, $currentFolderQuery);
$currentFolder = mysqli_fetch_assoc($currentFolderResult);

if (!$currentFolder) {
    echo json_encode(['success' => false, 'error' => 'Folder not found']);
    exit;
}

// Define the main 201 Files directory
$base_directory = "../img/201 Files/";

// Get the parent folder path if it exists
$parentFolderId = $currentFolder['parent_id'];
$parentFolderPath = '';

// If the folder has a parent, get the full path to the parent folder
if ($parentFolderId) {
    $pathSegments = [];
    $currentId = $parentFolderId;

    // Reconstruct the path to the parent folder
    while ($currentId !== null) {
        $stmt = $con->prepare("SELECT name, parent_id FROM 201_folders WHERE id = ?");
        $stmt->bind_param("i", $currentId);
        $stmt->execute();
        $stmt->bind_result($name, $nextParentId);

        if ($stmt->fetch()) {
            array_unshift($pathSegments, $name);
            $currentId = $nextParentId;
        } else {
            echo json_encode(['success' => false, 'error' => 'Parent folder not found.']);
            exit;
        }

        $stmt->close();
    }

    $parentFolderPath = implode('/', $pathSegments);
}

// Construct the current and new subfolder paths
$currentFolderPath = $base_directory . ($parentFolderPath ? $parentFolderPath . '/' : '') . $currentFolder['name'];
$newFolderPath = $base_directory . ($parentFolderPath ? $parentFolderPath . '/' : '') . $folder_name;

// Update the folder name in the database
$query = "UPDATE 201_folders SET name = '$folder_name' WHERE id = $folder_id";
if (mysqli_query($con, $query)) {
    // Rename the folder in the file system
    if (rename($currentFolderPath, $newFolderPath)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to rename folder in the file system']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Update failed: ' . mysqli_error($con)]);
}

mysqli_close($con);
?>