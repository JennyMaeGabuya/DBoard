<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_POST['update-employee-btn'])) {
    $emp_no = $_POST['emp_no'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $name_extension = $_POST['name_extension'];
    $email_address = $_POST['email_address'];
    $mobile_no = $_POST['mobile_no'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $pob = $_POST['pob'];
    $civil_status = $_POST['civil_status'];
    $designation = $_POST['designation'];
    $role = $_POST['role'];
    $hr_department = $_POST['hr_department'];
    $account_status = $_POST['account_status'];

    if ($civil_status === "Other" && !empty($_POST['other_civil_status'])) {
        $civil_status = trim($_POST['other_civil_status']);
    }

    $sex = $_POST['sex'];
    $blood_type = $_POST['blood_type'];
    $updated_at = date('Y-m-d');
    $created_at = date('Y-m-d');
    // Government records

    $gsis = !empty($_POST['gsis_no']) ? $_POST['gsis_no'] : 'N/A';
    $pag_ibig = !empty($_POST['pag_ibig_no']) ? $_POST['pag_ibig_no'] : 'N/A';
    $sss = !empty($_POST['sss_no']) ? $_POST['sss_no'] : 'N/A';
    $philhealth = !empty($_POST['philhealth_no']) ? $_POST['philhealth_no'] : 'N/A';
    $tin = !empty($_POST['tin_no']) ? $_POST['tin_no'] : 'N/A';

    // Retrieve the existing image name
    $image_name = NULL;
    $query = "SELECT `image` FROM `employee` WHERE `employee_no` = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $emp_no);
    $stmt->execute();
    $stmt->bind_result($existing_image);
    $stmt->fetch();
    $stmt->close();

    $image_name = $existing_image; // Default to the existing image

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];

        // Validate the image type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            $_SESSION['display'] = 'Invalid image type! Only JPG, PNG, and GIF are allowed.';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header('Location: edit-employee.php');
            exit();
        }

        // Define the upload directory
        $uploadDir = 'img/profile/';
        $image_name = basename($image['name']);
        $imagePath = $uploadDir . $image_name;

        // Move the uploaded file
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            $_SESSION['display'] = 'Failed to upload image!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
            header('Location: edit-employee.php');
            exit();
        }
    }

    // Update employee information
    $updateQuery = "UPDATE `employee` 
                    SET `firstname` = ?, `middlename` = ?, `lastname` = ?, `name_extension` = ?, `dob` = ?, `pob` = ?, 
                        `sex` = ?, `civil_status` = ?, `address` = ?, `blood_type` = ?, `mobile_no` = ?, 
                        `email_address` = ?, `image` = ?, `designation` = ?,`role` = ?, `account_status` = ?, `hr_staff` = ?,  `updated_at` = ?
                    WHERE `employee_no` = ?";

    $stmt = $con->prepare($updateQuery);
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param(
        "ssssssssssissssiiss",
        $firstname,
        $middlename,
        $lastname,
        $name_extension,
        $dob,
        $pob,
        $sex,
        $civil_status,
        $address,
        $blood_type,
        $mobile_no,
        $email_address,
        $image_name,
        $designation,
        $role,
        $account_status,
        $hr_department,
        $updated_at,
        $emp_no
    );

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    // Check if government_info exists
    $checkGovQuery = "SELECT employee_no FROM government_info WHERE employee_no = ?";
    $checkStmt = $con->prepare($checkGovQuery);
    $checkStmt->bind_param("s", $emp_no);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // Update if exists
        $govQuery = "UPDATE government_info 
                 SET gsis_no = ?, pag_ibig_no = ?, philhealth_no = ?, sss_no = ?, tin_no = ?, updated_at = ?
                 WHERE employee_no = ?";
        $govStmt = $con->prepare($govQuery);
        $govStmt->bind_param("sssssss", $gsis, $pag_ibig, $philhealth, $sss, $tin, $updated_at, $emp_no);
    } else {
        // Insert if not exists
        $govQuery = "INSERT INTO government_info 
                 (employee_no, gsis_no, pag_ibig_no, philhealth_no, sss_no, tin_no, created_at, updated_at) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $govStmt = $con->prepare($govQuery);
        $govStmt->bind_param("ssssssss", $emp_no, $gsis, $pag_ibig, $philhealth, $sss, $tin, $created_at, $updated_at);
    }

    if (!$govStmt->execute()) {
        die("Execution failed: " . $govStmt->error);
    }

    $_SESSION['display'] = 'Successfully updated employee information.';
    $_SESSION['title'] = 'Success';
    $_SESSION['success'] = 'success';

    header('Location: all-employees.php');
    exit();
}
