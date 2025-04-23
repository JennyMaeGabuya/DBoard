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
$checkQuery = "SELECT COUNT(*) as count FROM folders WHERE name = '$folder_name' AND id != $folder_id";
$checkResult = mysqli_query($con, $checkQuery);
$row = mysqli_fetch_assoc($checkResult);

if ($row['count'] > 0) {
    echo json_encode(['success' => false, 'error' => 'Folder name already exists']);
    exit;
}

// Update the folder name in the database
$query = "UPDATE folders SET name = '$folder_name' WHERE id = $folder_id";
if (mysqli_query($con, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Update failed: ' . mysqli_error($con)]);
}

mysqli_close($con);
?>