<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $folder_name = mysqli_real_escape_string($con, $_POST['folder_name']);

    // Log the folder name
    error_log("Folder Name: " . $folder_name); // 

    // Define the main CSC Files directory
    $base_directory = "../DBoard/img/CSC Files";

    // Ensure the base directory exists
    if (!file_exists($base_directory)) {
        mkdir($base_directory, 0777, true);
    }

    // Path for the new folder
    $folder_path = "$base_directory/$folder_name";

    // Check if folder already exists
    if (!file_exists($folder_path)) {
        if (mkdir($folder_path, 0777, true)) {
            // Insert into database
            $query = "INSERT INTO folders (name) VALUES ('$folder_name')";
            if (mysqli_query($con, $query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "error" => mysqli_error($con)]);
            }
        } else {
            echo json_encode(["success" => false, "error" => "Failed to create folder on server"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Folder already exists"]);
    }
}
?>