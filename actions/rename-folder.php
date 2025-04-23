<?php
header('Content-Type: application/json');

// Include database connection
include 'dbcon.php'; // Ensure this file contains the correct database connection

if (!isset($_POST['folder_id'], $_POST['folder_name'])) {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
    exit;
}

$folder_id = intval($_POST['folder_id']);
$folder_name = mysqli_real_escape_string($con, $_POST['folder_name']);

// Check if the folder name already exists
$checkQuery = "SELECT COUNT(*) as count FROM folders WHERE name = '$folder_name' AND id != $folder_id";
$checkResult = mysqli_query($con, $checkQuery);
$row = mysqli_fetch_assoc($checkResult);

if ($row['count'] > 0) {
    echo json_encode(['success' => false, 'error' => 'Folder name already exists']);
    exit;
}

// Get the current folder path from the database
$currentFolderQuery = "SELECT name FROM folders WHERE id = $folder_id";
$currentFolderResult = mysqli_query($con, $currentFolderQuery);
$currentFolder = mysqli_fetch_assoc($currentFolderResult);

if (!$currentFolder) {
    echo json_encode(['success' => false, 'error' => 'Folder not found']);
    exit;
}

// Define the main CSC Files directory
$base_directory = "../img/CSC Files/";
$currentFolderPath = $base_directory . $currentFolder['name'];
$newFolderPath = $base_directory . $folder_name;

// Update the folder name in the database
$query = "UPDATE folders SET name = '$folder_name' WHERE id = $folder_id";
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