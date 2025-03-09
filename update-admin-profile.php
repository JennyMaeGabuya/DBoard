<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

// Include the database connection file
include_once "dbcon.php";

// Set the user_id logged in as the employee_no
$employee_no = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the update type
    $update_type = $_POST['update_type'];

    // Handle basic information update
    if ($update_type === 'basic_info') {
        // Get the posted data for basic information
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $name_extension = $_POST['name_extension'];
        $email_address = $_POST['email_address'];
        $mobile_no = $_POST['mobileno'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];
        $pob = $_POST['pob'];
        $dob = $_POST['dob'];
        $station_place = $_POST['station_place'];

        // Handle file upload for the profile picture
        $image_name = null; // Initialize image name
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $image_name = basename($image['name']);
            $target_dir = "img/profile/";
            $target_file = $target_dir . $image_name;

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($image['tmp_name'], $target_file)) {
                echo "Error uploading file.";
            }
        }

        $query = "UPDATE employee e
        JOIN admin a ON e.employee_no = a.employee_no
        SET e.firstname = ?, e.middlename = ?, e.lastname = ?, e.name_extension = ?, 
            e.email_address = ?, e.mobile_no = ?, e.address = ?, 
            e.pob = ?, e.dob = ?, e.image = ?
        WHERE e.employee_no = ?";

        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $con->error);
        }

        // Bind only the `employee` table fields
        $stmt->bind_param(
            "sssssssssss",
            $firstname,
            $middlename,
            $lastname,
            $name_extension,
            $email_address,
            $mobile_no,
            $address,
            $pob,
            $dob,
            $image_name,
            $employee_no
        );

        if (!$stmt->execute()) {
            die("Error updating employee record: " . $stmt->error);
        }

        // Then, update the service_records table (designation & station_place)
        $service_query = "UPDATE service_records 
                SET designation = ?, station_place = ?
                WHERE employee_no = ?";

        $service_stmt = $con->prepare($service_query);
        if ($service_stmt === false) {
            die("Error preparing service_records statement: " . $con->error);
        }

        $service_stmt->bind_param("sss", $designation, $station_place, $employee_no);

        if (!$service_stmt->execute()) {
            die("Error updating service records: " . $service_stmt->error);
        }

        // Success - Redirect
        header('Location: my-profile.php?update=success');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

?>